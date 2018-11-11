<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Trick
 * @package App\Entity
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
     * @var
     */
    private $defaultImage;


    /**
     * @var ArrayCollection
     */
    private $images;


    /**
     * @var ArrayCollection
     */
    private $videos;

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
     * @throws \Exception
     */
    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->images = new ArrayCollection();
        $this->videos = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->comments = new ArrayCollection();
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * @return mixed
     */
    public function getDefaultImage()
    {
        return $this->defaultImage;
    }

    /**
     * @return mixed
     */
    public function getComments():Collection
    {
        return $this->comments;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param UuidInterface $id
     */
    public function setId(UuidInterface $id): void
    {
        $this->id = $id;
    }

    /**
     * @param null $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param null $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @param mixed $defaultImage
     */
    public function setDefaultImage($defaultImage): void
    {
        $this->defaultImage = $defaultImage;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }




    public function addImage(Image $image)
    {
        $image->setTrick($this);
        $this->images->add($image);
    }


    public function removeImage(Image $image)
    {
        $image->setTrick(null);
        $this->images->removeElement($image);
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }


    public function addVideo(Video $video)
    {
        $video->setTrick($this);
        $this->videos->add($video);
    }


    public function removeVideo(Video $video)
    {
        $video->setTrick(null);
        $this->videos->removeElement($video);
    }


    public function setVideos($videos)
    {
        $this->videos = $videos;
    }


    public function setImages($images)
    {
        $this->images = $images;
    }




}