<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\EditTrickResponderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;


/**
 * Class EditTrickResponder
 * @package App\UI\Responder
 */
class EditTrickResponder implements EditTrickResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;


    /**
     * EditTrickResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param $trick
     * @return RedirectResponse|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
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