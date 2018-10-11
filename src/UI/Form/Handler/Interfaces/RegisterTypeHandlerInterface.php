<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\UserBuilder;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

interface RegisterTypeHandlerInterface
{
    public function __construct(ObjectManager $manager, EncoderFactoryInterface $encoderFactory, UserBuilder $userBuilder);

    public function handle(FormInterface $form, $token);
}