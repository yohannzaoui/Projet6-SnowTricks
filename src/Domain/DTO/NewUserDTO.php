<?php

namespace App\Domain\DTO;

class NewUserDTO
{
    public $username;
    

    public $password;
    

    public $email;
    

    public $createdAt;
    

    public $token;
    

    public $ctoken;
    

	public $avatar;

    public function __construct($username, $password, $email, $createdAt, $token, $ctoken, $avatar)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->createdAt = $createdAt;
        $this->token = $token;
        $this->ctoken = $ctoken;
        $this->avatar = $avatar;
    }

    
}