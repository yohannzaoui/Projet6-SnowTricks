<?php

namespace App\UI\Responder;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\TrickResponderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class TrickResponder
 * @package App\UI\Responder
 */
class TrickResponder implements TrickResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    private $urlGenerator;

    /**
     * TrickResponder constructor.
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
     * @param FormInterface $form
     * @param $trick
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, FormInterface $form, $trick, $id = null)
    {
        $redirect

        ? $response =  new RedirectResponse($this->urlGenerator->generate('trick', [
            'id' => $id
        ]))

        : $response =  new Response($this->twig->render('trick/index.html.twig', [
            'form' => $form->createView(),
            'trick' => $trick
        ]), 200);

        return $response;
    }

}