<?php

namespace App\Domain\DTO;


use App\Domain\DTO\Interfaces\NewUserDTOInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public $image;




    public function __construct(
        $username,
        $password,
        $email,
        NewImageDTO $image
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
    }

    
}