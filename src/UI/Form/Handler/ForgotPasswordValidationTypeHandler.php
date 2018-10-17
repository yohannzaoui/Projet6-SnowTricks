<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/10/2018
 * Time: 21:50
 */

namespace App\UI\Form\Handler;


use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Domain\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class ForgotPasswordValidationTypeHandler
{

    private $userRepository;
    private $userBuilder;
    private $encoderFactory;

    public function __construct(UserRepository $userRepository, UserBuilderInterface $userBuilder, EncoderFactoryInterface $encoderFactory)
    {
        $this->userRepository = $userRepository;
        $this->userBuilder = $userBuilder;
        $this->encoderFactory = $encoderFactory;
    }

    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()){

            $password = $this->encoderFactory->getEncoder(User::class)->encodePassword($form->getData()->password, null);

            $this->userBuilder->resetPassword($password);

            $this->userBuilder->getUser();

            $this->userRepository->update();

            return true;
        }
        return false;
    }
}