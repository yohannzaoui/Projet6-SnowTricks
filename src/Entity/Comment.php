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
    public function getId(): UuidInterface
    {
        return $this->id;
    }


    /**
     * @param UuidInterface $id
     * @return $this|mixed
     */
    public function setId(UuidInterface $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }


    /**
     * @param string $message
     * @return $this|mixed
     */
    public function setMessage(?string $message)
    {
        $this->message = $message;

        return $this;
    }


    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }


    /**
     * @param \DateTime $createdAt
     * @return $this|mixed
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }


    /**
     * @return Trick
     */
    public function getTrick(): Trick
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
     * @return User
     */
    public function getAuthor(): User
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