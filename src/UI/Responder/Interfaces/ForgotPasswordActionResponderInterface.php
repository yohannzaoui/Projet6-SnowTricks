<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

/**
 * Interface ForgotPasswordActionResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface ForgotPasswordActionResponderInterface
{
    /**
     * ForgotPasswordActionResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param null $getEmail
     * @return mixed
     */
    public function __invoke($redirect = false, FormInterface $form = null, $getEmail = null);
}