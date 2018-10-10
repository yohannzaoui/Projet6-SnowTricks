<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;


class ConfirmeRegisterActionResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($redirect = false, $token = null)
    {
        $redirect
        ? $response = new Response($this->twig->render('confirme_register_validation/index.html.twig', [
            'token' => $token
        ]), 200)
        : $response = new Response($this->twig->render('register_validation_error/index.html.twig'), 200);
        return $response;
        
    }
}