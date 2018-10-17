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

    public $image;


    /**
     * NewUserDTO constructor.
     * @param null $username
     * @param null $password
     * @param null $email
     */
    public function __construct($username = null, $password = null, $email = null, $image = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
    }

    
}