<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 23:40
 */

namespace App\Helper\Interfaces;

use App\Services\Interfaces\EmailerInterface;

/**
 * Interface RegisterMailInterface
 * @package App\Helper\Interfaces
 */
interface MailerHelperInterface
{

    /**
     * MailerHelperInterface constructor.
     * @param EmailerInterface $mail
     */
    public function __construct(EmailerInterface $mail);

    /**
     * @param $email
     * @param $token
     * @return mixed
     */
    public function send($email, $token);
}