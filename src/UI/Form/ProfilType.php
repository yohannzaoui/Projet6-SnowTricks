<?php

namespace App\UI\Form;

use App\Domain\DTO\NewMediaDTO;
use Symfony\Component\Form\AbstractType;
use App\UI\Form\Interfaces\ProfilTypeInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ProfilType extends AbstractType implements ProfilTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, [
                'label' => 'Avatar (200x200 pixels au format PNG)'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewMediaDTO::class,
            'empty_data' => function(FormInterface $form) {
            return new NewMediaDTO($form->get('file')->getData());
            }
        ]);
    }
}