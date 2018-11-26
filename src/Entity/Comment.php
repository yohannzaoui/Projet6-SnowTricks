<?php

namespace App\Entity;

use App\Entity\Interfaces\CommentInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Comment
 * @package App\Entity
 */
class Comment implements CommentInterface
{

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var
     */
    private $author;

    /**
     * @var
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var
     */
    private $trick;


    /**
     * Comment constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->createdAt = new \DateTime();
    }


    /**
     * @return mixed|UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this|mixed
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $message
     * @return $this|mixed
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return \DateTime|mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     * @return $this|mixed
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
     * @param Trick $trick
     * @return $this|mixed
     */
    public function setTrick(Trick $trick)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /**
     * @param User $author
     * @return $this
     */
    public function setAuthor(User $author)
    {
        $this->author = $author;

        return $this;
    }
}