<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/10/2018
 * Time: 21:24
 */

namespace App\UI\Responder;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ForgotPasswordValidationResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(FormInterface $form)
    {
        $response = new Response($this->twig->render('reset/index.html.twig', [
            'form' => $form->createView()
        ]));
        return $response;
    }
}