<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Class HomeResponder
 * @package App\UI\Responder
 */
class HomeResponder implements HomeResponderInterface
{

    /**
     * @var Environment
     */
    private $twig;

    /**
     * HomeResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $tricks
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($tricks)
    {
        return new Response($this->twig->render('home/index.html.twig', [
                'tricks' => $tricks
            ]),
            200
        );
    }   
}