<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 22:26
 */

namespace App\Services;


use App\Services\Interfaces\TokenInterface;

/**
 * Class Token
 * @package App\Services
 */
class Token implements TokenInterface
{
    /**
     * @return string
     */
    static public function generateToken(): string
    {
        return md5(uniqid());
    }
}