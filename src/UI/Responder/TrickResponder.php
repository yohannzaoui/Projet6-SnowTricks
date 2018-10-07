<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\TrickResponderInterface;

class TrickResponder implements TrickResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(FormInterface $form, $trick)
    {
        return new Response(
            $this->twig->render('trick/index.html.twig', [
                'form' => $form->createView(),
                'trick' => $trick
            ]),
            200
        );
    }
}