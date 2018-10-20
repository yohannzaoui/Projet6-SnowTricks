<?php

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
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
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param FormInterface $form
     * @param $trick
     * @return mixed
     */
    public function __invoke($redirect = false, FormInterface $form, $trick, $id = null);
}