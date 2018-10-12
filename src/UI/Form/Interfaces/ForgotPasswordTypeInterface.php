<?php

namespace App\UI\Form\Interfaces;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface ForgotPasswordTypeInterface
 * @package App\UI\Form\Interfaces
 */
interface ForgotPasswordTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return mixed
     */
    public function buildForm(FormBuilderInterface $builder, array $options);

    /**
     * @param OptionsResolver $resolver
     * @return mixed
     */
    public function configureOptions(OptionsResolver $resolver);
}