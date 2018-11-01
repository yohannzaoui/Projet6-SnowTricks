<?php

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\NewUserDTOInterface;

/**
 * Class NewUserDTO
 * @package App\Domain\DTO
 */
class NewUserDTO implements NewUserDTOInterface
{
    /**
     * @var null
     */
    public $username;


    /**
     * @var null
     */
    public $password;


    /**
     * @var null
     */
    public $email;

    /**
     * @var null
     */
    public $profilImage;


    /**
     * NewUserDTO constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param NewProfilImageDTO|null $profilImage
     */
    public function __construct(
        $username,
        $password,
        $email,
        NewProfilImageDTO $profilImage = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->profilImage = $profilImage;
    }

    
}