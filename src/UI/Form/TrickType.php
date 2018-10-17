<?php

namespace App\UI\Form;

use App\Domain\DTO\NewTrickDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use App\UI\Form\Interfaces\TrickTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;

/**
 * Class AddTrickType
 * @package App\UI\Form
 */
class TrickType extends AbstractType implements TrickTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('image', FileType::class, [
                'required' => false
            ])
            ->add('video', TextType::class)
            ->add('category', CategoryNameType::class,[
                'required' => false
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewTrickDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewTrickDTO(
                    $form->get('name')->getdata(),
                    $form->get('description')->getdata(),
                    $form->get('image')->getdata(),
                    $form->get('video')->getdata()
                );
            }
        ]);
    }
}