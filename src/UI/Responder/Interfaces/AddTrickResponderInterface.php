<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

/**
 * Interface AddTrickResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface AddTrickResponderInterface
{
    /**
     * AddTrickResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param $trick
     * @return mixed
     */
    public function __invoke($redirect = false, FormInterface $form = null);
}