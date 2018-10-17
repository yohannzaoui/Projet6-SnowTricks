<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:24
 */

namespace App\Domain\Builder\Interfaces;


/**
 * Interface UserBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface UserBuilderInterface
{
    /**
     * @param $username
     * @param $password
     * @param $email
     * @param $token
     * @return mixed
     */
    public function createFromRegistration($username, $password, $email, $token);

    public function resetPassword($password);

    /**
     * @return mixed
     */
    public function getUser();
}