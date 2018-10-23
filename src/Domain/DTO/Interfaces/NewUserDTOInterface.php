<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:29
 */

namespace App\Domain\DTO\Interfaces;

use App\Domain\DTO\NewImageDTO;

/**
 * Interface NewUserDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewUserDTOInterface
{


    public function __construct($username, $password, $email, NewImageDTO $image);
}