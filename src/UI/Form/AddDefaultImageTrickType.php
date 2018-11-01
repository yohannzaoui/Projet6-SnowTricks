<?php

namespace App\UI\Form;

use App\Domain\DTO\NewDefaultImageDTO;
use App\Domain\DTO\NewImageDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AddDefaultImageTrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileName', FileType::class, [
                'label' => 'Sélectionnez une image principale',
                'attr' => [
                    'accept' => '.png, .jpeg, .jpg'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewDefaultImageDTO::class,
            'empty_data' => function (FormInterface $form) {
            return new NewDefaultImageDTO($form->get('fileName')->getData());
            }

        ]);
    }
}