<?php

namespace App\UI\Action\Interfaces;

use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;

interface RegisterActionInterface
{
    public function __construct(FormFactoryInterface $formFactory, RegisterTypeHandlerInterface $registerTypeHandler);

    public function __invoke(Request $request, EmailerInterface $mail, \Swift_Mailer $mailer, RegisterActionResponderInterface $responder);
}