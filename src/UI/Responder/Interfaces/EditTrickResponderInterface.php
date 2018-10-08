<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

interface EditTrickResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke($redirect = false, FormInterface $form = null, $trick);
}