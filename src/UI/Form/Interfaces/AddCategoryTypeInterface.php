<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 23:34
 */

namespace App\UI\Form\Interfaces;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface AddCategoryTypeInterface
 * @package App\UI\Form\Interfaces
 */
interface AddCategoryTypeInterface
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