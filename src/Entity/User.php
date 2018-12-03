<?php

namespace App\Entity;


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class User
 * @package
 */
class User implements UserInterface
{

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @var
     */
    private $email;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var
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
     * @var ArrayCollection
     */
    private $tricks;

    /**
     * @var
     */
    private $profilImage;


    /**
     * User constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->createdAt = new \DateTime;
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
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @return mixed
     */
    public function getProfilImage()
    {
        return $this->profilImage;
    }

    public function setId(UuidInterface $id)
    {
        $this->id = $id;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @param string $resetPasswordToken
     */
    public function setResetPasswordToken(string $resetPasswordToken): void
    {
        $this->resetPasswordToken = $resetPasswordToken;
    }


    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @param ArrayCollection $tricks
     */
    public function setTricks(ArrayCollection $tricks): void
    {
        $this->tricks = $tricks;
    }


    /**
     * @param $profilImage
     */
    public function setProfilImage($profilImage): void
    {
        $this->profilImage = $profilImage;
    }



}