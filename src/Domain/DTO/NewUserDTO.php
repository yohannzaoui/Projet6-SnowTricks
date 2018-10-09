<?php

namespace App\Domain\DTO;

class NewUserDTO
{
    public $username;
    

    public $password;
    

    public $email;
    

    /**
     * 
     */
    public function __construct($username = null, $password = null, $email = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }

    
}