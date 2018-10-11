<?php

namespace App\UI\Action;

use App\Mailer\Emailer;
use App\UI\Form\ForgotPasswordType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\ForgotPasswordActionInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use App\UI\Responder\Interfaces\ForgotPasswordActionResponderInterface;

/**
 * 
 */
class ForgotPasswordAction implements ForgotPasswordActionInterface
{
    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        ForgotPasswordTypeHandlerInterface $forgotPasswordTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->forgotPasswordTypeHandler = $forgotPasswordTypeHandler;
    }

    /**
     * 
     *@Route("/forgotPassword", name="forgot", methods={"GET","POST"})
     */
    public function __invoke(Request $request, Emailer $mail, \Swift_Mailer $mailer, ForgotPasswordActionResponderInterface $responder)
    {


        
        $form = $this->formFactory->create(ForgotPasswordType::class)
                                  ->handleRequest($request);
        
        if ($this->forgotPasswordTypeHandler->handle($form)) {
            $formData = $form->getData();
            $getEmail = $formData->getEmail();

            $token = md5($getEmail);
            $email = $mail->mail('Récupération de votre compte Snow Tricks', 
                                ['reset_password@snowtrick.com' => 'Récupération de mot passe'],
                                 $getEmail, 
                                 'TEST'.$token);
            $mailer->send($email);
            return $responder(true, $form, $getEmail);
        }

        return $responder(false, $form);
    }
}