<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register")
     */
    public function Register(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {

        $user = new User;
        
        $form = $this->createForm(RegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setCreatedAt(new \DateTime);
            
            $message = (new \Swift_Message('Validation de votre compte Snow Tricks'))
                        ->setFrom(['register@snowtrick.com' => 'Inscription à Snow Tricks'])
                        ->setTo($formData->getEmail())
                        ->setBody('TEST');
            $mailer->send($message);

            $manager->persist($user);
            $manager->flush();

            return $this->render('register_validation/index.html.twig', [
                'title' => 'En attente de validation',
                'email' => $formData->getEmail()
            ]);
            
        }
        return $this->render('register/index.html.twig', [
            'title' => 'Inscription',
            'form' => $form->createView()
        ]);
    }

}