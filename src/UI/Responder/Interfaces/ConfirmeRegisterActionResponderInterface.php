<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;

/**
 * Interface ConfirmeRegisterActionResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface ConfirmeRegisterActionResponderInterface
{
    /**
     * ConfirmeRegisterActionResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param bool $redirect
     * @param null $token
     * @return mixed
     */
    public function __invoke($redirect = false);
}