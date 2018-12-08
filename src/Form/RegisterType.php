<?php

namespace App\Form;

use App\Entity\User;
use App\Form\Interfaces\TypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


/**
 * Class RegisterType
 * @package App\UI\Form
 */
class RegisterType extends AbstractType implements TypeInterface
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('username', TextType::class, [
                'required' => true
            ])

            ->add('email', EmailType::class, [
                'required' => true
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'Votre mot de passe*'],
                'second_options' => ['label' => 'Confirmez votre mot de passe*'],
            ])

            ->add('profileImage', FileType::class, [
                'required' => false,
                'attr' => [
                    'accept' => '.png'
                ]
            ]);
    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

