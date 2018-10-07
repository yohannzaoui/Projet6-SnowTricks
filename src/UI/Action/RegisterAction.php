<?php

namespace App\UI\Action;

use App\Domain\Models\User;
use App\Mailer\Emailer;
use App\UI\Form\RegisterType;
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
    public function __invoke(Request $request, Emailer $mail, \Swift_Mailer $mailer, RegisterActionResponderInterface $responder)
    {
        $user = new User;
        
        $form = $this->formFactory->create(RegisterType::class, $user)->handleRequest($request);
        $formData = $form->getData();
        $getEmail = $formData->getEmail();
        
        if ($this->registerTypeHandler->handle($form, $user)) {
            $email = $mail->mail('Validation de votre compte Snow Tricks', 
                                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                                 $getEmail, 
                                 'TEST');
            $mailer->send($email);
            return $responder(true, $form, $getEmail);

        }
        return $responder(false, $form);
    }
}