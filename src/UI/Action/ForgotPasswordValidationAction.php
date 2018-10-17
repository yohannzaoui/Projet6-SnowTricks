<?php


namespace App\UI\Action;

use App\UI\Form\Handler\ForgotPasswordValidationTypeHandler;
use App\UI\Responder\ForgotPasswordValidationResponder;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Form\ForgotPasswordValidationType;
use Symfony\Component\Routing\Annotation\Route;


class ForgotPasswordValidationAction
{
    private $formFactory;
    private $formPasswordValidationTypeHandler;

    public function __construct(FormFactoryInterface $formFactory, ForgotPasswordValidationTypeHandler $formPasswordValidationTypeHandler)
    {
        $this->formFactory = $formFactory;
        $this->formPasswordValidationTypeHandler = $formPasswordValidationTypeHandler;
    }

    /**
     * @param Request $request
     * @Route("/forgotPasswordValidation/{token}", name="forgotPasswordValidation", methods={"GET","POST"})
     */
    public function __invoke(Request $request, ForgotPasswordValidationResponder $responder, ForgotPasswordValidationTypeHandler $formPasswordValidationTypeHandler)
    {

        $form = $this->formFactory->create(ForgotPasswordValidationType::class)->handleRequest($request);

        if($this->formPasswordValidationTypeHandler->handle($form)){
            return $responder();
        }
        return $responder($form);
    }
}