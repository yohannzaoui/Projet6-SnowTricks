<?php

namespace App\UI\Form;


use App\Domain\DTO\NewCategoryDTO;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


/**
 * Class AddCategoryType
 * @package App\UI\Form
 */
class AddCategoryType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,[
                'label' => 'Entrez le nom de la catégorie',

            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewCategoryDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new newCategoryDTO(
                    $form->get('name')->getData()
                );
            }
        ]);
    }

}