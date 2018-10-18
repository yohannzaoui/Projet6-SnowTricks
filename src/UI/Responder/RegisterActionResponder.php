<?php

namespace App\UI\Responder;

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

    /**
     * RegisterActionResponder constructor.
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
    public function __invoke(FormInterface $form)
    {

        $response = new Response($this->twig->render('register/index.html.twig',[
            'form' => $form->createView()
        ]), 200);

        return $response;
    }
}