<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:24
 */

namespace App\Domain\Builder\Interfaces;


use App\Domain\Models\Interfaces\ImageInterface;

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
     * @param $image
     * @param $token
     * @return mixed
     */
    public function createFromRegistration($username, $password, $email, $token, ImageInterface $image);


    /**
     * @return mixed
     */
    public function getUser();
}