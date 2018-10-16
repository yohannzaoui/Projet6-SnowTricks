<?php

namespace App\UI\Form;

use App\Domain\DTO\NewCategoryDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\CategoryTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;

/**
 * Class CategoryType
 * @package App\UI\Form
 */
class CategoryType extends AbstractType implements CategoryTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewCategoryDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewCategoryDTO(
                    $form->get('name')->getdata(),
                    $form->get('description')->getdata()

                );
            }
        ]);
    }

}