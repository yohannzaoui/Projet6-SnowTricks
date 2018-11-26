<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/10/2018
 * Time: 10:48
 */

namespace App\Form;


use App\Entity\Video;
use App\Form\Interfaces\TypeInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class VideoTrickType
 * @package App\Form
 */
class VideoTrickType extends AbstractType implements TypeInterface
{


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @return mixed|void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, [
                'label' => 'Copiez collez l\'URL (iFrame) de la video',
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     * @return mixed|void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }

}