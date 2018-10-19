<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\UserBuilder;
use App\Domain\Repository\UserRepository;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Twig\Environment;

/**
 * Interface RegisterTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface RegisterTypeHandlerInterface
{


    public function __construct(
        UserRepository $userRepository,
        EncoderFactoryInterface $encoderFactory,
        UserBuilder $userBuilder,
        EmailerInterface $mail,
        \Swift_Mailer $mailer,
        Environment $twig,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @param $token
     * @return mixed
     */
    public function handle(FormInterface $form);
}