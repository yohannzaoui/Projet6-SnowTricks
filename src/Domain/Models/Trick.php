<?php

namespace App\Domain\Models;

use App\Domain\Models\Interfaces\ImageInterface;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var null
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
     * @param $author
     * @param null $name
     * @param null $description
     * @param ImageInterface|null $defaultImage
     * @param array $images
     * @param array $videos
     * @param null $category
     * @throws \Exception
     */
    public function __construct(
        $author,
        $name = null,
        $description = null,
        ImageInterface $defaultImage = null,
        array $images = [],
        array $videos = [],
        $category = null
    ) {
        $this->id = Uuid::uuid4();
        $this->author = $author;
        $this->name = $name;
        $this->description = $description;
        $this->defaultImage = $defaultImage;
        $this->images = new ArrayCollection($images);
        $this->videos = new ArrayCollection($videos);
        $this->createdAt = new \DateTime();
        $this->updatedAt = null;
        $this->comments = new ArrayCollection();
        $this->category = $category;
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
     * @return Image
     */
    public function getDefaultImage(): ImageInterface
    {
        return $this->defaultImage;
    }

    /**
     * @return ArrayCollection
     */
    public function getImages(): \ArrayAccess
    {
        return $this->images;
    }

    /**
     * @return ArrayCollection
     */
    public function getVideos(): \ArrayAccess
    {
        return $this->videos;
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

}