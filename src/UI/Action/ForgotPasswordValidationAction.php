<?php


namespace App\UI\Action;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Form\ForgotPasswordValidationTypeType;


class ForgotPasswordValidationAction
{
    private $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function __invoke(Request $request)
    {
        $form = $this->formFactory->create(ForgotPasswordValidationType::class)->handleRequest($request);
    }
}