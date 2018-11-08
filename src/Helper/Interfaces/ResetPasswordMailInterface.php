<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 23:42
 */

namespace App\Helper\Interfaces;

use App\Services\Interfaces\EmailerInterface;

/**
 * Interface ResetPasswordMailInterface
 * @package App\Helper\Interfaces
 */
interface ResetPasswordMailInterface
{

    /**
     * ResetPasswordMailInterface constructor.
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