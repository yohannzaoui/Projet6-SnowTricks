<?php

namespace App\UI\Action\Interfaces;

use App\Domain\Builder\UserBuilder;
use App\Mailer\Interfaces\EmailerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

interface RegisterActionInterface
{
    public function __construct(
        FormFactoryInterface $formFactory, /*RegisterTypeHandlerInterface $registerTypeHandler,*/ EncoderFactoryInterface $encoderFactory, UserBuilder $userBuilder);

    public function __invoke(Request $request, EmailerInterface $mail, \Swift_Mailer $mailer, RegisterActionResponderInterface $responder, ObjectManager $manager);
}