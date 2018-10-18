<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

/**
 * Interface RegisterActionResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface RegisterActionResponderInterface
{
    /**
     * RegisterActionResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param bool $redirect
     * @param FormInterface $form
     * @param null $getEmail
     * @return mixed
     */
    public function __invoke(FormInterface $form);
}