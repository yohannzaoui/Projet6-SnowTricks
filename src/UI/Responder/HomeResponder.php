<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\HomeResponderInterface;

class HomeResponder implements HomeResponderInterface
{

	private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($tricks)
    {
        return new Response($this->twig->render('home/index.html.twig', [
                'tricks' => $tricks
            ]),
            200
        );
    }   
}