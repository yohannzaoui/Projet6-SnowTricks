<?php

namespace App\UI\Form\Interfaces;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface ForgotPasswordTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options);

    public function configureOptions(OptionsResolver $resolver);
}