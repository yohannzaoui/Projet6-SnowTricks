<?php

namespace App\UI\Form\Handler;

use App\Domain\Repository\UserRepository;
use App\Mailer\Interfaces\EmailerInterface;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\ForgotPasswordTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


/**
 * Class ForgotPasswordTypeHandler
 * @package App\UI\Form\Handler
 */
class ForgotPasswordTypeHandler implements ForgotPasswordTypeHandlerInterface
{

    /**
     * @var EmailerInterface
     */
    private $mail;
    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $twig;
    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * ForgotPasswordTypeHandler constructor.
     * @param EmailerInterface $mail
     * @param \Swift_Mailer $mailer
     * @param Environment $twig
     * @param UserRepository $userRepository
     */
    public function __construct(EmailerInterface $mail, \Swift_Mailer $mailer, Environment $twig, UserRepository $userRepository)
    {
        $this->mail = $mail;
        $this->mailer = $mailer;
        $this->twig = $twig;
        $this->userRepository = $userRepository;
    }


    /**
     * @param FormInterface $form
     * @return bool|mixed|Response
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isvalid()) {

                $token = md5(uniqid());

                $this->userRepository->saveResetToken($form->getData()->email, $token);

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