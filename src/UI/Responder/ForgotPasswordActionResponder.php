<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\UI\Responder\Interfaces\ForgotPasswordActionResponderInterface;

/**
 * Class ForgotPasswordActionResponder
 * @package App\UI\Responder
 */
class ForgotPasswordActionResponder implements ForgotPasswordActionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ForgotPasswordActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param null $getEmail
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, FormInterface $form = null, $getEmail = null)
    {
        $redirect
        ? $response = new Response($this->twig->render('reset_validation/index.html.twig', [
            'email' => $getEmail
        ]), 200)
        : $response = new Response($this->twig->render('forgot/index.html.twig', [
            'form' => $form->createView()
        ]), 200);
        return $response;
    }   
}