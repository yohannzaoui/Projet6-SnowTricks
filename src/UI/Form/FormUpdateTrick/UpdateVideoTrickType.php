<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 11:10
 */

namespace App\UI\Form\FormUpdateTrick;

use App\Domain\DTO\NewVideoDTO;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\UI\Form\Transformers\VideoUpdateTransformer;

class UpdateVideoTrickType extends AbstractType
{
    private $videoUpdateTransformer;

    public function __construct(VideoUpdateTransformer $videoUpdateTransformer)
    {
        $this->videoUpdateTransformer = $videoUpdateTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urls', TextareaType::class, [
                'label' => 'Copiez collez l\'URL de la video',
            ])

        ;
        $builder->get('urls')
            ->addViewTransformer($this->videoUpdateTransformer);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewVideoDTO::class,
        ]);
    }
}