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

    private $comment;

    private $tricks;

    private $profilImage;


    /**
     * User constructor.
     * @param string|null $username
     * @param string|null $password
     * @param string|null $email
     * @param string|null $token
     * @throws \Exception
     */
    public function __construct(
        string $username = null,
        string $password = null,
        string $email = null,
        string $token = null,
        $profilImage = null
    ) {
        $this->id = Uuid::uuid4();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->token = $token;
        $this->createdAt = new \DateTime;
        $this->profilImage = $profilImage;
    }

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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return null
     */
    public function getProfilImage()
    {
        return $this->profilImage;
    }

    /**
     * @param null $profilImage
     */
    public function setProfilImage($profilImage): void
    {
        $this->profilImage = $profilImage;
    }




}