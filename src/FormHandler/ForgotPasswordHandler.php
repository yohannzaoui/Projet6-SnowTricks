<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 06/11/2018
 * Time: 15:55
 */

namespace App\FormHandler;


use App\Helper\Interfaces\ResetPasswordMailInterface;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ForgotPasswordHandler
 * @package App\FormHandler
 */
class ForgotPasswordHandler
{
    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * @var ResetPasswordMailInterface
     */
    private $mail;

    /**
     * @var SessionInterface
     */
    private $messageFlash;


    /**
     * ForgotPasswordHandler constructor.
     * @param UserRepository $userRepository
     * @param ResetPasswordMailInterface $mail
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        UserRepository $userRepository,
        ResetPasswordMailInterface $mail,
        SessionInterface $messageFlash
    ) {
        $this->userRepository = $userRepository;
        $this->mail = $mail;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if ($this->userRepository->checkEmail($form->getData()->getEmail())) {

                $token = md5(uniqid());

                $this->userRepository->saveResetToken($form->getData()->getEmail(), $token);

                $this->mail->send($form->getData()->getEmail(), $token);

                $this->messageFlash->getFlashBag()->add('resetPassword',
                    'Un email à l\'adresse ' .$form->getData()
                        ->getEmail(). ' vient de vous être envoyez pour la récupération de votre compte');
                return true;
            }
            $this->messageFlash->getFlashBag()->add('checkMailError','L\'adresse email est inconnue');
        }
        return false;
    }
}