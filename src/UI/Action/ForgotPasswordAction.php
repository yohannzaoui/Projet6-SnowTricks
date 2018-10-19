<?php

namespace App\UI\Action;

use App\UI\Form\ForgotPasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\ForgotPasswordActionInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\UI\Responder\Interfaces\ForgotPasswordActionResponderInterface;


/**
 * Class ForgotPasswordAction
 * @package App\UI\Action
 */
class ForgotPasswordAction implements ForgotPasswordActionInterface
{
    private $formFactory;
    private $forgotPasswordTypeHandler;


    /**
     * ForgotPasswordAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param ForgotPasswordTypeHandlerInterface $forgotPasswordTypeHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ForgotPasswordTypeHandlerInterface $forgotPasswordTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->forgotPasswordTypeHandler = $forgotPasswordTypeHandler;
    }

    /**
     * 
     *@Route("/forgotPassword", name="forgot", methods={"GET","POST"})
     */
    public function __invoke(Request $request, ForgotPasswordActionResponderInterface $responder)
    {

        $form = $this->formFactory->create(ForgotPasswordType::class)->handleRequest($request);

        if ($this->forgotPasswordTypeHandler->handle($form)) {
            return $responder($form);
        }
        return $responder($form);
    }
}