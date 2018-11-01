<?php

namespace App\UI\Form;

use App\Domain\DTO\NewTrickDTO;
use App\Domain\Models\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\TrickTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Class AddTrickType
 * @package App\UI\Form
 */
class UpdateTrickType extends AbstractType implements TrickTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', HiddenType::class)

            ->add('name', TextType::class, [
                'required' => true
            ])

            ->add('description', TextareaType::class, [
                'required' => true
            ])

            ->add('defaultImage', AddDefaultImageTrickType::class, [
                'required' => true
            ])

            ->add('images', AddImageTrickType::class, [
                'required' => false
            ])

            ->add('videos', AddVideoTrickType::class, [
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
                    $form->get('author')->getData(),
                    $form->get('name')->getdata(),
                    $form->get('description')->getdata(),
                    $form->get('defaultImage')->getData(),
                    $form->get('images')->getdata(),
                    $form->get('videos')->getdata(),
                    $form->get('category')->getData()
                );
            }
        ]);
    }
}