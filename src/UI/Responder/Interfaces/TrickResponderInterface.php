<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

interface TrickResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke(FormInterface $form, $trick);
}