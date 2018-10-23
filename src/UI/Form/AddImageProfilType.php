<?php

namespace App\UI\Form;

use App\Domain\DTO\NewImageDTO;
use Symfony\Component\Form\AbstractType;
use App\UI\Form\Interfaces\ProfilTypeInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class AddImageProfilType extends AbstractType implements ProfilTypeInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', FileType::class, [
                'label' => '(image au format PNG)',
                'attr' => [
                    'accept' => '.png'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewImageDTO::class,
            'empty_data' => function(FormInterface $form) {
            return new NewImageDTO($form->get('file')->getData());
            }
        ]);
    }
}