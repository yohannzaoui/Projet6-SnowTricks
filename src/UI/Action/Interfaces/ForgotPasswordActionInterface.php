<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\UI\Responder\Interfaces\ForgotPasswordActionResponderInterface;

/**
 * Interface ForgotPasswordActionInterface
 * @package App\UI\Action\Interfaces
 */
interface ForgotPasswordActionInterface
{
    /**
     * ForgotPasswordActionInterface constructor.
     * @param FormFactoryInterface $formFactory
     * @param ForgotPasswordTypeHandlerInterface $forgotPasswordTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, ForgotPasswordTypeHandlerInterface $forgotPasswordTypeHandler);

    /**
     * @param Request $request
     * @param ForgotPasswordActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, ForgotPasswordActionResponderInterface $responder);
}