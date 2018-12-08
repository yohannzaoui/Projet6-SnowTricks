<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 10:52
 */

namespace App\Event;


use App\Event\Interfaces\MailEventInterface;
use Symfony\Component\EventDispatcher\Event;
use App\Services\Interfaces\EmailerInterface;

/**
 * Class ResetPasswordMailEvent
 * @package App\Event
 */
class ResetPasswordMailEvent extends Event implements MailEventInterface
{

    /**
     *
     */
    const NAME = 'resetPasswordMail.event';


    private $email;


    private $token;

    /**
     * @var EmailerInterface
     */
    private $emailer;

    /**
     * RegisterMailEvent constructor.
     * @param EmailerInterface $emailer
     * @param $email
     * @param $token
     */
    public function __construct(
        EmailerInterface $emailer,
        string $email,
        string $token
    ) {
        $this->emailer = $emailer;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     *
     */
    public function sendEmail()
    {
        $this->emailer->mail('Récupération de votre compte Snow Tricks',
            [ 'reset_password@snowtricks.com' => 'Récupération de mot passe'],
            $this->email,
            'Changer votre mot de passe en cliquant sur ce lien : "http://st/forgotPasswordValidation/'.$this->token);
    }
}