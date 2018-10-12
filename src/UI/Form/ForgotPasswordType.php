<?php

namespace App\UI\Form;

use App\Domain\DTO\NewUserDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\UI\Form\Interfaces\ForgotPasswordTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormInterface;

/**
 * Class ForgotPasswordType
 * @package App\UI\Form
 */
class ForgotPasswordType extends AbstractType implements ForgotPasswordTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewUserDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new newUserDTO(
                    $form->get('email')->getdata()
                );
            }
        ]);
    }
}