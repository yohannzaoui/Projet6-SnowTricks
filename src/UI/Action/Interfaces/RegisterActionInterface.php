<?php

namespace App\UI\Action\Interfaces;

use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;

/**
 * Interface RegisterActionInterface
 * @package App\UI\Action\Interfaces
 */
interface RegisterActionInterface
{
    /**
     * RegisterActionInterface constructor.
     * @param FormFactoryInterface $formFactory
     * @param RegisterTypeHandlerInterface $registerTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, RegisterTypeHandlerInterface $registerTypeHandler);

    /**
     * @param Request $request
     * @param EmailerInterface $mail
     * @param \Swift_Mailer $mailer
     * @param RegisterActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, RegisterActionResponderInterface $responder, \Swift_Mailer $mailer, EmailerInterface $mail);
}