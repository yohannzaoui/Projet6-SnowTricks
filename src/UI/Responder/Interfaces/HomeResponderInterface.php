<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;


/**
 * Interface HomeResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface HomeResponderInterface
{
    /**
     * HomeResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $trick
     * @return mixed
     */
    public function __invoke($trick);
}