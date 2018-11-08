<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/10/2018
 * Time: 21:50
 */

namespace App\FormHandler;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class ForgotPasswordValidationTypeHandler
 * @package App\FormHandler
 */
class ForgotPasswordValidationTypeHandler
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;
    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * ForgotPasswordValidationTypeHandler constructor.
     * @param UserRepository $userRepository
     * @param EncoderFactoryInterface $encoderFactory
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        EncoderFactoryInterface $encoderFactory,
        SessionInterface $messageFlash
    ) {
        $this->userRepository = $userRepository;
        $this->encoderFactory = $encoderFactory;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param $token
     * @param FormInterface $form
     * @return bool
     */
    public function handle($token, FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()){

            $password = $this->encoderFactory->getEncoder(User::class)
                ->encodePassword($form->getData()->getPassword(), null);

            $this->userRepository->resetPassword($token, $password);

            $this->messageFlash->getFlashBag()->add('resetPassword',
                'Votre mot de passe à bien été mis à jour. Connectez vous !!!');

            return true;
        }
        return false;
    }
}