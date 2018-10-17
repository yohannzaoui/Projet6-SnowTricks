<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

/**
 * Interface TrickResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface TrickResponderInterface
{
    /**
     * TrickResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param FormInterface $form
     * @param $trick
     * @return mixed
     */
    public function __invoke($redirect = false, FormInterface $form, $trick);
}