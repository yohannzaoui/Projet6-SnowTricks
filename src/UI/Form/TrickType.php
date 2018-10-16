<?php

namespace App\UI\Form;

use App\Domain\DTO\NewTrickDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\TrickTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\ImageType;

/**
 * Class AddTrickType
 * @package App\UI\Form
 */
class TrickType extends AbstractType implements TrickTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('image', TextType::class)
            ->add('video', TextType::class)
            ->add('category', CategoryNameType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewTrickDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewTrickDTO(
                    $form->get('name')->getdata(),
                    $form->get('description')->getdata()
                );
            }
        ]);
    }
}