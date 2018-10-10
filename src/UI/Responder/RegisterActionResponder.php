<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;


class RegisterActionResponder implements RegisterActionResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($redirect = false, FormInterface $form = null, $getEmail = null)
    {
        $redirect
        ? $response = new Response($this->twig->render('register_validation/index.html.twig',[
            'email' => $getEmail
        ]), 200)
        : $response = new Response($this->twig->render('register/index.html.twig', [
            'form' => $form->createView()
        ]), 200);
        return $response;
    }
}