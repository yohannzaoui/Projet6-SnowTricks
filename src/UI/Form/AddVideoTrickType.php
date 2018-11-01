<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/10/2018
 * Time: 10:48
 */

namespace App\UI\Form;


use App\Domain\DTO\NewVideoDTO;
use App\UI\Form\Transformers\VideoTransformer;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddVideoTrickType extends AbstractType
{

    private $videoTransformer;

    public function __construct(VideoTransformer $videoTransformer)
    {
        $this->videoTransformer = $videoTransformer;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('urls', TextareaType::class, [
                'label' => 'Copiez collez l\'URL de la video (plusieurs URLs possible séparées par une virgule)',
            ])

        ;
        $builder->get('urls')->addViewTransformer($this->videoTransformer);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewVideoDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewVideoDTO(
                    $form->get('urls')->getData()
                );
            }
        ]);
    }

}