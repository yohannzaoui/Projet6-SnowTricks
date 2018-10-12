<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\UserBuilder;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
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
     * @param ObjectManager $manager
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserBuilder $userBuilder
     */
    public function __construct(ObjectManager $manager, EncoderFactoryInterface $encoderFactory, UserBuilder $userBuilder, EmailerInterface $mail, \Swift_Mailer $mailer, Environment $twig);

    /**
     * @param FormInterface $form
     * @param $token
     * @return mixed
     */
    public function handle(FormInterface $form);
}