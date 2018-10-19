<?php

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param null $token
     * @return mixed
     */
    public function __invoke($redirect = false, $token = null);
}