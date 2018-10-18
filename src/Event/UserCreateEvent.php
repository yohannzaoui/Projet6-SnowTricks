<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 20:36
 */

namespace App\Event;


use App\Mailer\Emailer;
use Symfony\Component\EventDispatcher\Event;
use Twig\Environment;

/**
 * Class UserCreateEvent
 * @package App\Event
 */
class UserCreateEvent extends Event
{
    /**
     *
     */
    const NAME = 'usercreate.event';

    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $token;

    private $mail;

    private $twig;

    private $mailer;

    /**
     * UserCreateEvent constructor.
     * @param $email
     * @param $token
     */
    public function __construct($email, $token, $twig, $mailer)
    {
        $this->email = $email;
        $this->token = $token;
        $this->mail = new Emailer();
        $this->twig = $twig;
        $this->mailer = $mailer;


    }


    /**
     * @param Emailer $mail
     * @param \Swift_Mailer $mailer
     * @param Environment $twig
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public  function email()
    {
        $email = $this->mail->mail('Validation de votre compte Snow Tricks',
            ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
            $this->email,
            $this->twig->render('email/registration.html.twig', [
                'token' => $this->token
            ]));

        $this->mailer->send($email);
    }

}