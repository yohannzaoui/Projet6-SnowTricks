<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ForgotPasswordController extends AbstractController
{
    /**
     *@Route("/forgotPassword", name="forgot")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $user = new User;

        $form = $this->createFormBuilder($user)
            ->add('email', EmailType::class)
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();

            $message = (new \Swift_Message('Récupération de votre compte Snow Tricks'))
                        ->setFrom(['reset_password@snowtrick.com' => 'Récupération de mot passe'])
                        ->setTo($formData->getEmail())
                        ->setBody('TEST');
            $mailer->send($message);

            return $this->redirectToRoute('reset_validation', [
                'email' => $formData->getEmail()
            ]);
        }

        return $this->render('forgot/index.html.twig',[
            'title' => 'Mot de passe oublié',
            'form' => $form->createView()
        ]);
    }

    /**
     *@Route("/resetPassword", name="reset")
     */
    public function resetPassword()
    {
        $form = $this->createFormBuilder()
            ->add('password', PasswordType::class)
            ->add('confirmePassword', PasswordType::class)
            ->getForm();

        return $this->render('reset/index.html.twig',[
            'title' => 'Réinitialisez votre mot de passe',
            'form' => $form->createView()
        ]);
    }
    
}