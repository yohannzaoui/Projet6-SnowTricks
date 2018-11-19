<?php

namespace App\Form;


use App\Entity\Image;
use App\Form\Interfaces\TypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class DefaultImageTrickType extends AbstractType implements TypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'Sélectionnez une image principale',
                'attr' => [
                    'accept' => '.png, .jpeg, .jpg'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,

        ]);
    }
}