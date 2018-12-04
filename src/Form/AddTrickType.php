<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\Category;
use App\Form\Interfaces\TypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Class AddTrickType
 * @package App\Form
 */
class AddTrickType extends AbstractType implements TypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', TextType::class, [
                'required' => true
            ])

            ->add('description', TextareaType::class, [
                'required' => true
            ])

            ->add('defaultImage', ImageTrickType::class, [
                'required' => true,
                'attr' => [
                    'accept' => '.png, .jpeg, .jpg'
                ]
            ])

            ->add('images', CollectionType::class, [
                "entry_type" => ImageTrickType::class,
                'entry_options' => ['label' => false],
                'required' => false,
                "allow_add"     => true,
                "allow_delete"  => true,
                "by_reference"  => false,
                'attr' => [
                    'accept' => '.png, .jpeg, .jpg'
                ]
            ])

            ->add('videos', CollectionType::class, [
                "entry_type" => VideoTrickType::class,
                'entry_options' => ['label' => false],
                'required' => false,
                "allow_add"     => true,
                "allow_delete"  => true,
                "by_reference"  => false
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
            'data_class' => Trick::class,
        ]);
    }
}