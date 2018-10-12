<?php

namespace App\UI\Action;

use App\UI\Form\RegisterType;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\RegisterActionInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;

class RegisterAction implements RegisterActionInterface
{

    private $formFactory;
    private $registerTypeHandler;

    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        RegisterTypeHandlerInterface $registerTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->registerTypeHandler = $registerTypeHandler;
        
    }
    

    public function __invoke(Request $request, EmailerInterface $mail, \Swift_Mailer $mailer, RegisterActionResponderInterface $responder)
    {
        $form = $this->formFactory->create(RegisterType::class)
                                  ->handleRequest($request);
        $token = md5(str_rot13(crypt('abcdefghijklmnopqrstwxyz1234567890', null)));
        if ($this->registerTypeHandler->handle($form, $token)) {
            
            $formData = $form->getData();
            $getEmail = $formData->email;
            $email = $mail->mail('Validation de votre compte Snow Tricks',
                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                $getEmail,
                "Veuillez confirmez votre compte en cliquant sur ce lien\n\n http://st/confirmeregister/$token");
            $mailer->send($email);
            
            return $responder(true, $form, $getEmail);
        }
        return $responder(false, $form);

    }
}