<?php

namespace App\UI\Form;

use App\Domain\DTO\NewTrickDTO;
use App\Domain\Models\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\TrickTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * Class AddTrickType
 * @package App\UI\Form
 */
class AddTrickType extends AbstractType implements TrickTypeInterface
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

            ->add('image', AddImageTrickType::class, [
                'required' => false
            ])

            /*->add('image', CollectionType::class, [
                'entry_type' => AddImageTrickType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
                'by_reference' => false,
                'entry_options' => [
                    'required' => false
                ]
            ])*/

            ->add('video', AddVideoTrickType::class, [
                'required' => false
            ])

            ->add('category', EntityType::class,[
                'class' => Category::class,
                'choice_label' => 'name',
                'expanded' => false,
                'multiple' => false
            ]);
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
                    $form->get('description')->getdata(),
                    $form->get('image')->getdata(),
                    $form->get('video')->getdata(),
                    $form->get('category')->getData()
                );
            }
        ]);
    }
}