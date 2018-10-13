<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\AddTrickResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;


/**
 * Class AddTrickResponder
 * @package App\UI\Responder
 */
class AddTrickResponder implements AddTrickResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;


    /**
     * AddTrickResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @return RedirectResponse|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, FormInterface $form = null)
    {
        $redirect
        ? $response = new RedirectResponse('/')
        : $response = new Response($this->twig->render('edit/index.html.twig', [
            'form' => $form->createView()
        ]), 200);
        return $response;        
    }
}