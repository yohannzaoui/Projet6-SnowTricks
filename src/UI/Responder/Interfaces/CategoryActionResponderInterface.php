<?php

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;

/**
 * Interface CategoryActionResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface CategoryActionResponderInterface
{
    /**
     * CategoryActionResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param bool $redirect
     * @param FormInterface $form
     * @param $categoryList
     * @return mixed
     */
    public function __invoke($redirect = false, FormInterface $form, $categoryList);
}