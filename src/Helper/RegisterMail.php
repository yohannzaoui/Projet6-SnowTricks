<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 23:18
 */

namespace App\Helper;


use App\Helper\Interfaces\RegisterMailInterface;
use App\Services\Interfaces\EmailerInterface;

/**
 * Class RegisterMail
 * @package App\Helper
 */
class RegisterMail implements RegisterMailInterface
{

    /**
     * @var EmailerInterface
     */
    private $mail;


    /**
     * RegisterMail constructor.
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
        $this->mail->mail('Validation de votre compte Snow Tricks',
                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                $email,
                'Veuillez confirmez votre compte en cliquant sur ce lien : "http://st/confirmeregister/'.$token);
    }
}