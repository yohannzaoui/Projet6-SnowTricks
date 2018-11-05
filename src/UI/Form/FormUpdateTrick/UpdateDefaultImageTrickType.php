<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 10:56
 */

namespace App\UI\Form\FormUpdateTrick;


use App\Domain\DTO\NewDefaultImageDTO;
use App\UI\Form\Transformers\ImageDefaultTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UpdateDefaultImageTrickType extends AbstractType
{
    private $imageTransformer;

    public function __construct(ImageDefaultTransformer $imageTransformer)
    {
        $this->imageTransformer = $imageTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileName', FileType::class, [
                'label' => 'Sélectionnez une image principale',
                'attr' => [
                    'accept' => '.png, .jpeg, .jpg'
                ]
            ]);

        $builder->get('fileName')
            ->addViewTransformer($this->imageTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewDefaultImageDTO::class,
        ]);
    }
}