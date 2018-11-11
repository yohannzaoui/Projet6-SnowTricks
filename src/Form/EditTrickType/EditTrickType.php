<?php

namespace App\Form\EditTrickType;

use App\Entity\Trick;
use App\Entity\Category;
use App\Form\AddTrickType\AddTrickType;
use App\Form\Transformers\ImageDefaultTransformer;
use function foo\func;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class EditTrickType extends AbstractType
{
    private $imageDefaultTransformer;

    public function __construct(ImageDefaultTransformer $imageDefaultTransformer)
    {
        $this->imageDefaultTransformer = $imageDefaultTransformer;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
          ->get('defaultImage')->addViewTransformer($this->imageDefaultTransformer);


    }

    public function getParent()
    {
        return AddTrickType::class;
    }



}