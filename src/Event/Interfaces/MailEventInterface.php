<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 11:09
 */

namespace App\Event\Interfaces;

use App\Services\Interfaces\EmailerInterface;

/**
 * Interface MailEventInterface
 * @package App\Event\Interfaces
 */
interface MailEventInterface
{
    /**
     * MailEventInterface constructor.
     * @param EmailerInterface $emailer
     * @param $email
     * @param $token
     */
    public function __construct(
        EmailerInterface $emailer,
        string $email,
        string $token
    );

    /**
     * @return mixed
     */
    public function sendEmail();
}