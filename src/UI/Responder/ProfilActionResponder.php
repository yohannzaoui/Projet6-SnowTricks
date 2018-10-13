<?php

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ProfilActionResponderInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;


class ProfilActionResponder implements ProfilActionResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($redirect = false, $form)
    {
        $redirect
        ? $response = new Response($this->twig->render('home/index.html.twig'), 200)
        : $response = new Response($this->twig->render('profil/index.html.twig', [
            'form' => $form->createView()
        ]), 200);
        return $response;
    }


}