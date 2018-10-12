<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\EditTrickResponderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * 
 */
class EditTrickResponder implements EditTrickResponderInterface
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
    public function __invoke($redirect = false, FormInterface $form = null, $trick)
    {
        $redirect
        ? $response = new RedirectResponse('/')
        : $response = new Response($this->twig->render('edit/index.html.twig', [
            'form' => $form->createView(),
            'editmode' => $trick->getId() !== null
        ]), 200);
        return $response;        
    }
}