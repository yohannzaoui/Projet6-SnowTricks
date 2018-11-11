<?php

namespace App\Form\AddTrickType;

use App\Entity\Trick;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AddTrickType extends AbstractType
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

            ->add('defaultImage', FileType::class, [
                'required' => true
            ])

            ->add('images', CollectionType::class, [
                "entry_type" => AddImageTrickType::class,
                "entry_options" => ['label' => false],
                "allow_add"     => true,
                "allow_delete"  => true,
                "by_reference"  => false
            ])

            ->add('videos', CollectionType::class, [
                "entry_type" => AddVideoTrickType::class,
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