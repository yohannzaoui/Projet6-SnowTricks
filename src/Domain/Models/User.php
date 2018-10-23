<?php

namespace App\Domain\Models;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @var array
     */
    private $roles = [];

    /**
     * @var
     */
    private $resetPasswordToken;

    /**
     * @var
     */
    private $comments;

    /**
     * @var
     */
    private $tricks;


    /**
     * @var
     */
    private $image;


    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param $image
     * @param $token
     * @throws \Exception
     */
    public function __construct(
        $username,
        $password,
        $email,
        Image $image,
        $token
    ) {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->image = $image;
        $this->token = $token;
        $this->createdAt = new \DateTime;
        $this->comments = new ArrayCollection();
        $this->tricks = new ArrayCollection();
    }

    /**
     * @param bool $validate
     */
    public function setValidate(bool $validate)
    {
        if ($validate) {
            $this->roles = ['ROLE_USER'];
            $this->token = null;
        } else {
            $this->roles = [];
        }
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
    public function getRoles(): array
    {
        return $this->roles;
    }


    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
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
     * @return mixed
     */
    public function getTricks()
    {
        return $this->tricks;
    }

    /**
     * @param mixed $trick
     */
    public function setTricks($tricks): void
    {
        $this->tricks = $tricks;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }



}