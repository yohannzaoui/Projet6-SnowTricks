<?php

namespace App\Domain\Models;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

    /**
     * @var
     */
    private $id;
    /**
     * @var null
     */
    private $username;
    /**
     * @var
     */
    private $password;
    /**
     * @var null
     */
    private $email;
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var null
     */
    private $token;
    /**
     * @var
     */
    private $ctoken;
    /**
     * @var string
     */
    private $roles;

    /**
     * User constructor.
     * @param null $username
     * @param $password
     * @param callable|null $passwordEncoder
     * @param null $email
     * @param null $token
     */
    public function __construct(string $username = null,
                                string $password = null,
                                string $email = null,
                                string $token = null
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->token = $token;
        $this->createdAt = new \DateTime;
        $this->roles = 'ROLE_USER';
    }

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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setUsername($username)
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

    /**
     *
     */
    public function eraseCredentials()
    {
        
    }

    /**
     * @return null|string|void
     */
    public function getSalt()
    {
        
    }

    /**
     * @return array
     */
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
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}