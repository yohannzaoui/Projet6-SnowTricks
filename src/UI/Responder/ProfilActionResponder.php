<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;


class ProfilActionResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {
        $response = new Response();
        return $response;
    }


}