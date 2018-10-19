<?php

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;


/**
 * Class RegisterActionResponder
 * @package App\UI\Responder
 */
class RegisterActionResponder implements RegisterActionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    private $urlGenerator;

    /**
     * RegisterActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
) {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
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
    public function __invoke($redirect = false, FormInterface $form)
    {
        $redirect
        ? $response = new RedirectResponse($this->urlGenerator->generate('register'))
        : $response = new Response($this->twig->render('register/index.html.twig',[
            'form' => $form->createView()
        ]), 200);

        return $response;
    }
}