<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Interfaces\TypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

/**
 * Class ImageProfilType
 * @package App\Form
 */
class ImageProfilType extends AbstractType implements TypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return mixed|void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('profilImage', FileType::class, [
                'label' => 'Change ton image de profile (image au format PNG)',
                'attr' => [
                    'accept' => '.png'
                ]
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     * @return mixed|void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}