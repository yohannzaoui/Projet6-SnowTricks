<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ForgotPasswordController extends AbstractController
{
    /**
     *@Route("/forgotPassword", name="forgot")
     */
    public function index()
    {
        $form = $this->createFormBuilder()
            ->add('email', EmailType::class)
            ->getForm();

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