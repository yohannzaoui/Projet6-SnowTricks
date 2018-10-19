<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use App\Mailer\Interfaces\EmailerInterface;
use App\Domain\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

/**
 * Interface ForgotPasswordTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface ForgotPasswordTypeHandlerInterface
{

    /**
     * ForgotPasswordTypeHandlerInterface constructor.
     * @param EmailerInterface $mail
     * @param \Swift_Mailer $mailer
     * @param Environment $twig
     * @param UserRepository $userRepository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        EmailerInterface $mail,
        \Swift_Mailer $mailer,
        Environment $twig,
        UserRepository $userRepository,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @return mixed
     */
    public function handle(FormInterface $form);
}