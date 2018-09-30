<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields= {"email"}, message = "L'email est déja utilisé !")
 */
class User implements UserInterface
{
    /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $id;

    /**
   * @ORM\Column(name="username", type="string", length=255)
   */
    private $username;

    /**
   * @ORM\Column(name="password", type="string", length=255)
   * @Assert\Length(min = 8, max = 20, minMessage = "Votre mot de passe doit faire minimum 8 caractères", maxMessage = "Votre mot doit être de 20 caractères maximum")
   */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath = "password", message = "Les mots de passe ne corresponde pas")
     */
    private $confirmePassword;

    /**
   * @ORM\Column(name="email", type="string", length=255)
   * @Assert\Email()
   */
    private $email;

    /**
   * @ORM\Column(name="createdAt", type="date")
   */
    private $createdAt;

    /**
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @ORM\Column(name="ctoken", type="string", length=255)
     */
    private $ctoken;

    

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
}