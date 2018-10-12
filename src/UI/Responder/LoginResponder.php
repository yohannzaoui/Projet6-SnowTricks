<?php

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\LoginResponderInterface;
use Twig\Environment;

class LoginResponder implements LoginResponderInterface
{

	private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    public function __invoke()
    {
        return new Response($this->twig->render('login/index.html.twig'), 200);
    }
}