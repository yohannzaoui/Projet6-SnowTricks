<?php

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\LoginResponderInterface;
use Twig\Environment;

/**
 * Class LoginResponder
 * @package App\UI\Responder
 */
class LoginResponder implements LoginResponderInterface
{

    /**
     * @var Environment
     */
    private $twig;

    /**
     * LoginResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($error, $lastUsername)
    {
        return new Response($this->twig->render('login/index.html.twig.', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]), 200);
    }
}