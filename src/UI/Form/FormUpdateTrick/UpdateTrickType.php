<?php

namespace App\UI\Form\FormUpdateTrick;

use App\Domain\DTO\NewUpdateTrickDTO;
use App\Domain\Models\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\TrickTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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

            ->add('defaultImage', UpdateDefaultImageTrickType::class, [
                'required' => true
            ])

            ->add('images', CollectionType::class, [
                'entry_type' => UpdateImagesTrickType::class,
                'entry_options' => [
                    'label' => false
                ]
            ])

            ->add('videos', UpdateVideoTrickType::class, [
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
            'data_class' => NewUpdateTrickDTO::class,
        ]);
    }
}