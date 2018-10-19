<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 16:34
 */

namespace App\UI\Form;

use Symfony\Component\Form\AbstractType;

use App\Domain\DTO\NewTrickDTO;
use App\Domain\Models\Trick;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EditTrickType extends AbstractType
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
            ->add('image', FileType::class)
            ->add('video', TextType::class);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {

    }
}