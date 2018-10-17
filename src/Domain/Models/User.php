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
     * @var bool
     */
    private $active;

    /**
     * @var int
     */
    private $image;


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
                                string $image = null
    ) {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->token = $token;
        $this->createdAt = new \DateTime;
        $this->roles[] = 'ROLE_USER';
        $this->validated = false;
        $this->active = false;
        $this->image = $image;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }


    /**
     * Get the value of pseudo
     */ 
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt()
    {
        return $this->createdAt;
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
     * @return bool
     */
    public function isValidated(): bool
    {
        return $this->validated;
    }

    /**
     * @return int
     */
    public function getImage(): int
    {
        return $this->image;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }




    /**
     * @return mixed
     */
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }


    /**
     * @param $username
     * @param $email
     */
    public function updateCredentials($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    /**
     * @param $password
     */
    public function resetPassword($password)
    {
        $this->password = $password;
    }

    /**
     *
     */
    public function validate()
    {
        $this->validated = true;
        $this->active = true;
    }

}