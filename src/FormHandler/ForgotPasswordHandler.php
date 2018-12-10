<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 06/11/2018
 * Time: 15:55
 */

namespace App\FormHandler;


use App\Event\ResetPasswordMailEvent;
use App\FormHandler\Interfaces\ForgotPasswordHandlerInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\EmailerInterface;
use App\Services\Interfaces\TokenInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ForgotPasswordHandler
 * @package App\FormHandler
 */
class ForgotPasswordHandler implements ForgotPasswordHandlerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var TokenInterface
     */
    private $tokenService;


    /**
     * ForgotPasswordHandler constructor.
     * @param UserRepository $userRepository
     * @param SessionInterface $messageFlash
     * @param EventDispatcherInterface $eventDispatcher
     * @param TokenInterface $tokenService
     */
    public function __construct(
        UserRepository $userRepository,
        SessionInterface $messageFlash,
        EventDispatcherInterface $eventDispatcher,
        TokenInterface $tokenService
    ) {
        $this->userRepository = $userRepository;
        $this->messageFlash = $messageFlash;
        $this->eventDispatcher = $eventDispatcher;
        $this->tokenService = $tokenService;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if ($this->userRepository->checkEmail($form->getData()['email'])) {

                $token = $this->tokenService::generateToken();

                $this->userRepository->saveResetToken($form->getData()['email'], $token);

                $this->eventDispatcher->dispatch(ResetPasswordMailEvent::NAME,
                    new ResetPasswordMailEvent($form->getData()['email'], $token));

                $this->messageFlash->getFlashBag()->add('resetPassword',
                    'Un email à l\'adresse ' .$form->getData()['email']. ' vient de vous être envoyez pour la récupération de votre compte');
                return true;
            }
            $this->messageFlash->getFlashBag()->add('checkMailError','L\'adresse email est inconnue');
        }
        return false;
    }
}