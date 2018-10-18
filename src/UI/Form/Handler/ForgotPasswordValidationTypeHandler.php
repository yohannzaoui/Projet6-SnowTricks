<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/10/2018
 * Time: 21:50
 */

namespace App\UI\Form\Handler;

use App\Domain\Models\User;
use App\Domain\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class ForgotPasswordValidationTypeHandler
{

    private $userRepository;
    private $encoderFactory;

    public function __construct(
        UserRepository $userRepository,
        EncoderFactoryInterface $encoderFactory
    ) {
        $this->userRepository = $userRepository;
        $this->encoderFactory = $encoderFactory;
    }

    public function handle($token, FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()){

            $password = $this->encoderFactory->getEncoder(User::class)->encodePassword($form->getData()->password, null);

            $this->userRepository->resetPassword($token, $password);

            $messageFlash = new Session;
            $messageFlash->getFlashBag()->add('resetPassword','Votre mot de passe à bien été mis à jour');

            return true;
        }
        return false;
    }
}