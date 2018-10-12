<?php

namespace App\UI\Form;

use App\Domain\DTO\NewUserDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\RegisterTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

/**
 * 
 */
class RegisterType extends AbstractType implements RegisterTypeInterface
{

    /**
     * 
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
                'first_options' => ['label' => 'Votre mot de passe'],
                'second_options' => ['label' => 'Confirmez votre mot de passe'],
            ]);
    }

    /**
     * 
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewUserDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new newUserDTO(
                    $form->get('username')->getdata(),
                    $form->get('email')->getdata(),
                    $form->get('password')
                );
            }
        ]);
    }
}

