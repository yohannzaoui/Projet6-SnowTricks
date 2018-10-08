<?php

namespace App\UI\Action\Interfaces;

use App\Mailer\Emailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\UI\Responder\Interfaces\ForgotPasswordActionResponderInterface;

interface ForgotPasswordActionInterface
{
    public function __construct(FormFactoryInterface $formFactory, ForgotPasswordTypeHandlerInterface $forgotPasswordTypeHandler);

    public function __invoke(Request $request, Emailer $mail, \Swift_Mailer $mailer, ForgotPasswordActionResponderInterface $responder);
}