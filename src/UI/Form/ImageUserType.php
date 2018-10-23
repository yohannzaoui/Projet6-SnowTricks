<?php

namespace App\UI\Form;

use App\Domain\DTO\NewImageDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImageUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileName', FileType::class, [
                'label' => 'Images de profil',
                'attr' => [
                    'accept' => '.png'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewImageDTO::class,
            'empty_data' => function (FormInterface $form) {
            return new NewImageDTO($form->get('fileName')->getData());
            }

        ]);
    }
}