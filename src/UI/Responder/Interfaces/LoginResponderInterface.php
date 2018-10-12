<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;

/**
 * Interface LoginResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface LoginResponderInterface
{
    /**
     * LoginResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @return mixed
     */
    public function __invoke($error, $lastUsername);

}