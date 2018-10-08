<?php

namespace App\UI\Form;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TestType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewTrickDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new newTrickDTO(
                    $form->get('name')->getdata(),
                    $form->get('description')->getdata()
                );
            }
        ]);
    }
}