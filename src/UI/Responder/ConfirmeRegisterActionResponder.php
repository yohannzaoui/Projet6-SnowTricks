<?php

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class ConfirmeRegisterActionResponder
 * @package App\UI\Responder
 */
class ConfirmeRegisterActionResponder implements ConfirmeRegisterActionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ConfirmeRegisterActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param bool $redirect
     * @param null $token
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, $token = null)
    {
        $redirect
        ? $response = new Response($this->twig->render('confirme_register_validation/index.html.twig', [
            'token' => $token
        ]), 200)
        : $response = new Response($this->twig->render('register_validation_error/index.html.twig'), 200);
        return $response;
        
    }
}