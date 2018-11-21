<?php

namespace App\Form;

use App\Entity\Trick;
use App\Entity\Category;
use App\Form\Interfaces\TypeInterface;
use App\Form\Transformers\ImageDefaultTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EditTrickType extends AbstractType implements TypeInterface
{

    /*private $imageDefaultTransformer;

    public function __construct(ImageDefaultTransformer $imageDefaultTransformer)
    {
        $this->imageDefaultTransformer = $imageDefaultTransformer;
    }*/


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', TextType::class, [
                'required' => false
            ])

            ->add('description', TextareaType::class, [
                'required' => false
            ])

            ->add('defaultImage', DefaultImageTrickType::class, [
                'required' => false
            ])

            ->add('images', CollectionType::class, [
                "entry_type"    => ImageTrickType::class,
                'required'      => false,
                "entry_options" => ['label' => false],
                "allow_add"     => true,
                "prototype"     => true,
                "allow_delete"  => true,
                "by_reference"  => false
            ])

            ->add('videos', CollectionType::class, [
                "entry_type"    => VideoTrickType::class,
                'required'      => false,
                "allow_add"     => true,
                "prototype"     => true,
                "allow_delete"  => true,
                "by_reference"  => false
            ])

            ->add('category', EntityType::class,[
                'class'        => Category::class,
                'choice_label' => 'name',
                'expanded'     => false,
                'multiple'     => false
            ]);

        //$builder->get('defaultImage')->addViewTransformer($this->imageDefaultTransformer);

    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }

}