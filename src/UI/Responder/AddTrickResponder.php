<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\AddTrickResponderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * 
 */
class AddTrickResponder implements AddTrickResponderInterface
{
    private $twig;

    /**
     * 
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }
    
    /**
     * 
     */
    public function __invoke($redirect = false, FormInterface $form = null)
    {
        $redirect
        ? $response = new RedirectResponse('/')
        : $response = new Response($this->twig->render('add/index.html.twig', [
            'form' => $form->createView()
        ]));
        return $response;        
    }
}