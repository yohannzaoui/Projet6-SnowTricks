<?php

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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

    private $urlGenerator;

    /**
     * ConfirmeRegisterActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
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
        ? $response = new RedirectResponse($this->urlGenerator->generate('login'))
        : $response = new Response($this->twig->render('error/register_validation_error.html.twig'), 200);
        return $response;
        
    }
}