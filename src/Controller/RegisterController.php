<?php

namespace App\Controller;

use App\Entity\User;
use App\Mailer\Emailer;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * @Route("/inscription", name="register", methods={"GET","POST"})
     */
    public function Register(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer, Emailer $mail)
    {

        $user = new User;
        
        $form = $this->createForm(RegisterType::class, $user)
                     ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $user->setCreatedAt(new \DateTime);

            $email = $mail->mail('Validation de votre compte Snow Tricks', 
                                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                                 $formData->getEmail(), 
                                 'TEST');
            $mailer->send($email);

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