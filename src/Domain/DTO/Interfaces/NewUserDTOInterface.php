<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:29
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewUserDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewUserDTOInterface
{
    /**
     * NewUserDTOInterface constructor.
     * @param null $username
     * @param null $password
     * @param null $email
     */
    public function __construct($username = null, $password = null, $email = null);
}