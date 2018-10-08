<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;


interface HomeResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke($trick);
}