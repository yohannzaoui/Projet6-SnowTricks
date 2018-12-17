<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 11:09
 */

namespace App\Event\Interfaces;


/**
 * Interface MailEventInterface
 * @package App\Event\Interfaces
 */
interface MailEventInterface
{
    /**
     * MailEventInterface constructor.
     * @param $email
     * @param $token
     */
    public function __construct(
        string $email,
        string $token
    );

    /**
     * @return mixed
     */
    public function getEmail(): string;

    /**
     * @return mixed
     */
    public function getToken(): string;
}