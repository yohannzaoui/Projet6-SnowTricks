<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class DeleteTrickResponder
 * @package App\UI\Responder
 */
class DeleteTrickResponder
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * DeleteTrickResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return RedirectResponse
     */
    public function __invoke()
    {
       $response = new RedirectResponse('/');
       return $response;
    }
}