<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/11/2018
 * Time: 23:37
 */

namespace App\Form\Interfaces;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interfaces TypeInterface
 * @package App\Form\Interfaces
 */
interface TypeInterface
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