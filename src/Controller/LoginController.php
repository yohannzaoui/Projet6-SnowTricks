<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LoginController extends AbstractController
{
    /**
     * @Route("/connexion", name="login")
     */
    public function index()
    {

        $form = $this->createFormBuilder()
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->getForm();

        return $this->render('login/index.html.twig', [
            'title' => 'Connexion',
            'form' => $form->createView()
        ]);
    }
}