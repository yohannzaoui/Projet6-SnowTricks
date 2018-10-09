<?php

namespace App\UI\Action;


use App\UI\Form\RegisterType;
use App\Domain\DTO\NewUserDTO;
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
    
    /**
     * @Route("/inscription", name="register", methods={"GET","POST"})
     */
    public function __invoke(Request $request, EmailerInterface $mail, \Swift_Mailer $mailer, RegisterActionResponderInterface $responder)
    {
        $userDTO = new NewUserDTO;
        $form = $this->formFactory->create(RegisterType::class, $userDTO)
                                  ->handleRequest($request);
        $formData = $form->getData();
        $getEmail = $formData->email;
        $token = md5($getEmail);

        if ($this->registerTypeHandler->handle($form, $token)) {
            $email = $mail->mail('Validation de votre compte Snow Tricks', 
                                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                                 $getEmail, 
                                 'TEST'.$token);
            $mailer->send($email);
            return $responder(true, $form, $getEmail);

        }
        return $responder(false, $form);
    }
}