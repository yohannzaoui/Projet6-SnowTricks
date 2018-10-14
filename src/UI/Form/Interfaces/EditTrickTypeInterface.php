<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/10/2018
 * Time: 23:00
 */

namespace App\UI\Form\Interfaces;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


interface EditTrickTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options);

    public function configureOptions(OptionsResolver $resolver);
}