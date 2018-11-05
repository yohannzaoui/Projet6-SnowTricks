<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 10:40
 */

namespace App\UI\Form\FormUpdateTrick;


use App\UI\Form\Transformers\ImageTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Domain\DTO\NewImageDTO;

class UpdateImagesTrickType extends AbstractType
{
    private $imageTransformer;

    public function __construct(ImageTransformer $imageTransformer)
    {
        $this->imageTransformer = $imageTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fileName', FileType::class, [
                'label' => 'Images supplémentaires (plusieurs choix possible)',
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
            'data_class' => NewImageDTO::class,
        ]);
    }
}