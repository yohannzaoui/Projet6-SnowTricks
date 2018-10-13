<?php

namespace App\Domain\Models;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package App\Domain\Models
 */
class User implements UserInterface
{

    /**
     * @var UuidInterface
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
     * @var string
     */
    private $roles;

    /**
     * @var bool
     */
    private $validated;

    /**
     * @var int
     */
    private $profilImage;

    /**
     * @var
     */
    private $resetPasswordToken;


    /**
     * User constructor.
     * @param string|null $username
     * @param string|null $password
     * @param string|null $email
     * @param string|null $token
     * @param int|null $profilImage
     * @throws \Exception
     */
    public function __construct(string $username = null,
                                string $password = null,
                                string $email = null,
                                string $token = null,
                                int $profilImage = null
    ) {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->token = $token;
        $this->createdAt = new \DateTime;
        $this->roles = 'ROLE_USER';
        $this->validated = false;
        $this->profilImage = $profilImage;
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
     * Set the value of roles
     *
     * @return  self
     */ 
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return bool
     */
    public function isValidated(): bool
    {
        return $this->validated;
    }

    /**
     * @param bool $validated
     */
    public function setValidated(bool $validated): void
    {
        $this->validated = $validated;
    }

    /**
     * @return string
     */
    public function getProfilImage(): string
    {
        return $this->profilImage;
    }

    /**
     * @param string $profilImage
     */
    public function setProfilImage(string $profilImage): void
    {
        $this->profilImage = $profilImage;
    }

    /**
     * @return mixed
     */
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }

    /**
     * @param mixed $resetPasswordToken
     */
    public function setResetPasswordToken($resetPasswordToken): void
    {
        $this->resetPasswordToken = $resetPasswordToken;
    }










}