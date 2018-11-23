<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 23:31
 */

namespace App\Helper;


use App\Helper\Interfaces\MailerHelperInterface;
use App\Services\Interfaces\EmailerInterface;

/**
 * Class ResetPasswordMail
 * @package App\Helper
 */
final class ResetPasswordMail implements MailerHelperInterface
{

    /**
     * @var EmailerInterface
     */
    private $mail;


    /**
     * ResetPasswordMail constructor.
     * @param EmailerInterface $mail
     */
    public function __construct(EmailerInterface $mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param $email
     * @param $token
     */
    public function send($email, $token)
    {
        $this->mail->mail('Récupération de votre compte Snow Tricks',
            ['reset_password@snowtrick.com' => 'Récupération de mot passe'],
            $email,
            'Changer votre mot de passe en cliquant sur ce lien : "http://st/forgotPasswordValidation/'.$token);
    }
}