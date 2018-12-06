<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 22:28
 */

namespace App\Services\Interfaces;


/**
 * Interface TokenInterface
 * @package App\Services\Interfaces
 */
interface TokenInterface
{
    /**
     * @return string
     */
    static public function generateToken(): string;
}