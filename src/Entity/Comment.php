<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Orm\Entity
 */
class Comment
{
    /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
    private $id;

    /**
   * @ORM\Column(name="pseudo", type="string", length=255)
   */
    private $pseudo;

    /**
   * @ORM\Column(name="message", type="text")
   */
    private $message;

    /**
   * @ORM\Column(name="createdAt", type="date")
   */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="comment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trick;

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
     * Get the value of message
     */ 
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public function setMessage($message)
    {
        $this->message = $message;

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
     * Get the value of trick
     */ 
    public function getTrick()
    {
        return $this->trick;
    }

    /**
     * Set the value of trick
     *
     * @return  self
     */ 
    public function setTrick($trick)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }
}