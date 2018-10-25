<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 23:14
 */

namespace App\UI\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Domain\DTO\NewUserDTO;
use Symfony\Component\Form\FormInterface;


/**
 * Class ForgotPasswordValidationType
 * @package App\UI\Form
 */
class ForgotPasswordValidationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'Votre mot de passe'],
                'second_options' => ['label' => 'Confirmez votre mot de passe'],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewUserDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewUserDTO(
                    $form->get('password')->getData()
                );
            }
        ]);
    }
}