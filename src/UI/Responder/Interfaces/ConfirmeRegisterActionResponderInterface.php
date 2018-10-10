<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;

interface ConfirmeRegisterActionResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke($redirect = false, $token = null);
}