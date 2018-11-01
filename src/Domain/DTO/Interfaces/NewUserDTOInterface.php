<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:29
 */

namespace App\Domain\DTO\Interfaces;

use App\Domain\DTO\NewProfilImageDTO;

/**
 * Interface NewUserDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewUserDTOInterface
{


    /**
     * NewUserDTOInterface constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param NewProfilImageDTO $profilImage
     */
    public function __construct(
        $username,
        $password,
        $email,
        NewProfilImageDTO $profilImage
    );
}