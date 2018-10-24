<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/10/2018
 * Time: 10:48
 */

namespace App\UI\Form;


use App\Domain\DTO\NewVideoDTO;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddVideoTrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, [
                'label' => 'Copiez collez l\'url de la video du trick (plusieurs URLs possible)',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewVideoDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new NewVideoDTO(
                    $form->get('url')->getData()
                );
            }
        ]);
    }

}