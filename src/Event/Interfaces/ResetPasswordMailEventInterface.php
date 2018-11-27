<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 11:10
 */

namespace App\Event\Interfaces;

use App\Services\Interfaces\EmailerInterface;

/**
 * Interface ResetPasswordMailEventInterface
 * @package App\Event\Interfaces
 */
interface ResetPasswordMailEventInterface
{
    /**
     * ResetPasswordMailEventInterface constructor.
     * @param EmailerInterface $emailer
     * @param $email
     * @param $token
     */
    public function __construct(
        EmailerInterface $emailer,
        $email,
        $token
    );

    /**
     * @return mixed
     */
    public function sendEmail();
}