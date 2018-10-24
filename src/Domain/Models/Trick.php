<?php

namespace App\Domain\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * 
 */
class Trick
{

    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var null
     */
    private $name;
    /**
     * @var null
     */
    private $description;


    /**
     * @var Image
     */
    private $image;


    /**
     * @var Video
     */
    private $video;

    /**
     * @var
     */
    private $comments;

    /**
     * @var
     */
    private $author;
    /**
     * @var
     */
    private $category;
    /**
     * @var
     */
    private $createdAt;
    /**
     * @var
     */
    private $updatedAt;


    /**
     * Trick constructor.
     * @param null $name
     * @param null $description
     * @param Image|null $image
     * @param Video|null $video
     * @param null $author
     * @param null $category
     * @throws \Exception
     */
    public function __construct(
        $name = null,
        $description = null,
        Image $image = null,
        Video $video = null,
        //User $author = null,
        $category = null
    ) {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->video = $video;
        //$this->author = $author;
        $this->createdAt = new \DateTime();
        $this->updatedAt = null;
        $this->comments = new ArrayCollection();
        $this->category = $category;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
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
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

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
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }


    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param array|null $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }



    public function getVideo()
    {
        return $this->video;
    }



    public function setVideo($video): void
    {
        $this->video = $video;
    }

}