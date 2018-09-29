<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

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
            'form' => $form->createView()
        ]);
    }
    
}