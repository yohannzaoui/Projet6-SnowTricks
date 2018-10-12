<?php

namespace App\UI\Form\Handler;

use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use Twig\Environment;


class ForgotPasswordTypeHandler implements ForgotPasswordTypeHandlerInterface
{

    private $mail;
    private $mailer;
    private $twig;


    public function __construct(EmailerInterface $mail, \Swift_Mailer $mailer, Environment $twig)
    {
        $this->mail = $mail;
        $this->mailer = $mailer;
        $this->twig = $twig;
    }


    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isvalid()) {

            $token = md5(str_rot13(crypt('abcdefghijklmnopqrstwxyz1234567890', null)));

            $email = $this->mail->mail('Récupération de votre compte Snow Tricks',
                ['reset_password@snowtrick.com' => 'Récupération de mot passe'],
                $form->getData()->email,
                $this->twig->render('email/reset_password.html.twig', [
                    'token' => $token
                ]));
            $this->mailer->send($email);
            return true;
        }
        return false;
    }
}