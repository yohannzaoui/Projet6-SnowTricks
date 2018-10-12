<?php

namespace App\Domain\Models;

/**
 * Class Comment
 * @package App\Domain\Models
 */
class Comment
{

    /**
     * @var
     */
    private $id;
    /**
     * @var null
     */
    private $pseudo;
    /**
     * @var null
     */
    private $message;
    /**
     * @var \DateTime
     */
    private $createdAt;
    /**
     * @var null
     */
    private $trick;

    /**
     * Comment constructor.
     * @param null $pseudo
     * @param null $message
     * @param null $trick
     */
    public function __construct($pseudo = null, $message = null, $trick = null)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->createdAt = new \DateTime();
        $this->trick = $trick;
    }


    /**
     * @return mixed
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