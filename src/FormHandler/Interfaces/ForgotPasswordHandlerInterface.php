<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/11/2018
 * Time: 10:38
 */

namespace App\FormHandler\Interfaces;


use App\Repository\UserRepository;
use App\Services\Interfaces\TokenInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interfaces ForgotPasswordHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface ForgotPasswordHandlerInterface
{

    /**
     * ForgotPasswordHandlerInterface constructor.
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
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}