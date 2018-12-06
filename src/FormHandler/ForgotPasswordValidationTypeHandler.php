<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/10/2018
 * Time: 21:50
 */

namespace App\FormHandler;

use App\Entity\User;
use App\FormHandler\Interfaces\ForgotPasswordValidationTypeHandlerInterface;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Services\Interfaces\EncoderInterface;

/**
 * Class ForgotPasswordValidationTypeHandler
 * @package App\FormHandler
 */
class ForgotPasswordValidationTypeHandler implements ForgotPasswordValidationTypeHandlerInterface
{

    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EncoderInterface
     */
    private $encoder;
    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * ForgotPasswordValidationTypeHandler constructor.
     * @param UserRepository $userRepository
     * @param EncoderInterface $encoder
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        EncoderInterface $encoder,
        SessionInterface $messageFlash
    ) {
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;
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

            $password = $this->encoder->encodePassword(
                User::class, $form->getData()->getPassword()
            );

            $this->userRepository->resetPassword($token, $password);

            $this->messageFlash->getFlashBag()->add('resetPassword',
                'Votre mot de passe à bien été mis à jour. Connectez vous !!!');

            return true;
        }
        return false;
    }
}