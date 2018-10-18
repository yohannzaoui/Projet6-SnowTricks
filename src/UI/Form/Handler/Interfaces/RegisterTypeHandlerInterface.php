<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\UserBuilder;
use App\Domain\Repository\UserRepository;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Twig\Environment;

/**
 * Interface RegisterTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface RegisterTypeHandlerInterface
{

    /**
     * RegisterTypeHandlerInterface constructor.
     * @param UserRepository $userRepository
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserBuilder $userBuilder
     * @param EmailerInterface $mail
     * @param \Swift_Mailer $mailer
     * @param Environment $twig
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(UserRepository $userRepository,
                                EncoderFactoryInterface $encoderFactory,
                                UserBuilder $userBuilder,
                                EmailerInterface $mail,
                                \Swift_Mailer $mailer,
                                Environment $twig,
                                EventDispatcherInterface $eventDispatcher
    );

    /**
     * @param FormInterface $form
     * @param $token
     * @return mixed
     */
    public function handle(FormInterface $form);
}