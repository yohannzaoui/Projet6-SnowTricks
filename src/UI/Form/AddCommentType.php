<?php

namespace App\UI\Form;

use App\Domain\DTO\NewCommentDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Interfaces\CommentTypeInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

/**
 * Class AddCommentType
 * @package App\UI\Form
 */
class AddCommentType extends AbstractType implements CommentTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo', HiddenType::class)
            ->add('message', TextareaType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewCommentDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new newCommentDTO(
                    $form->get('pseudo')->getdata(),
                    $form->get('message')->getdata()
                );
            }
        ]);
    }

}