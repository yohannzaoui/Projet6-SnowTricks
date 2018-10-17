<?php

namespace App\UI\Form\Handler;

use App\Domain\Repository\UserRepository;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class ForgotPasswordTypeHandler implements ForgotPasswordTypeHandlerInterface
{

    private $mail;
    private $mailer;
    private $twig;
    private $userRepository;


    public function __construct(EmailerInterface $mail, \Swift_Mailer $mailer, Environment $twig, UserRepository $userRepository)
    {
        $this->mail = $mail;
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->userRepository = $userRepository;
    }


    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isvalid()) {

            if ($this->userRepository->checkEmail($form->getData()->email)){

                $token = md5(uniqid());

                dump($token);

                $email = $this->mail->mail('Récupération de votre compte Snow Tricks',
                    ['reset_password@snowtrick.com' => 'Récupération de mot passe'],
                    $form->getData()->email,
                    $this->twig->render('email/reset_password.html.twig', [
                        'token' => $token
                    ]));
                $this->mailer->send($email);
                return true;
            }

            return new Response('Email inconnu');
            }
        return false;
    }
}