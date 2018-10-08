<?php

namespace App\Domain\Models;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
  
    private $id;
    private $username;
    private $password;
    private $confirmePassword;
    private $email;
    private $createdAt;
    private $token;
    private $ctoken;
    private $avatar;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getUserName()
    {
        return $this->username;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setUserName($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function eraseCredentials()
    {
        
    }

    public function getSalt()
    {
        
    }

    public function getRoles()
    {
        return ['ROLE_USER'];
    }


    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of ctoken
     */ 
    public function getCtoken()
    {
        return $this->ctoken;
    }

    /**
     * Set the value of ctoken
     *
     * @return  self
     */ 
    public function setCtoken($ctoken)
    {
        $this->ctoken = $ctoken;

        return $this;
    }

    /**
     * Get the value of confirmePassword
     */ 
    public function getConfirmePassword()
    {
        return $this->confirmePassword;
    }

    /**
     * Set the value of confirmePassword
     *
     * @return  self
     */ 
    public function setConfirmePassword($confirmePassword)
    {
        $this->confirmePassword = $confirmePassword;

        return $this;
    }


    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}