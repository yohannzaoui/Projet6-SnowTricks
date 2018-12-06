<?php

namespace App\Entity;

use App\Entity\Interfaces\TrickInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Trick
 * @package App\Entity
 */
class Trick implements TrickInterface
{

    /**
     * @var UuidInterface
     */
    private $id;


    /**
     * @var
     */
    private $name;


    /**
     * @var
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
     * @var ArrayCollection
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
     * @var \DateTime
     */
    private $createdAt;


    /**
     * @var
     */
    private $updatedAt;


    /**
     * @var
     */
    private $slug;


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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }



    public function getDefaultImage(): ?Image
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
     * @return User
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }


    /**
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }


    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt():? \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param UuidInterface $id
     */
    public function setId(UuidInterface $id)
    {
        $this->id = $id;
    }


    /**
     * @param string $name
     */
    public function setName(?string $name)
    {
        $this->name = $name;
    }


    /**
     * @param string $description
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
    }

    /**
     * @param Image|null $defaultImage
     */
    public function setDefaultImage(?Image $defaultImage)
    {
        $this->defaultImage = $defaultImage;
    }

    /**
     * @param Comment $comments
     */
    public function setComments(Comment $comments)
    {
        $this->comments = $comments;
    }


    /**
     * @param User $author
     */
    public function setAuthor(?User $author)
    {
        $this->author = $author;
    }


    /**
     * @param Category|null $category
     */
    public function setCategory(?Category $category)
    {
        $this->category = $category;
    }


    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt)
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


    /**
     * @param Image $image
     */
    public function addImage(Image $image)
    {
        $image->setTrick($this);
        $this->images->add($image);
    }


    /**
     * @param Image $image
     */
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


    /**
     * @param Video $video
     */
    public function addVideo(Video $video)
    {
        $video->setTrick($this);
        $this->videos->add($video);
    }


    /**
     * @param Video $video
     */
    public function removeVideo(Video $video)
    {
        $video->setTrick(null);
        $this->videos->removeElement($video);
    }


    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }


    /**
     * @param string $slug
     */
    public function setSlug(?string $slug)
    {
        $this->slug = $slug;
    }

}