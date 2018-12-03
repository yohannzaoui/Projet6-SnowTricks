<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 10:09
 */

namespace App\Entity\Interfaces;

use App\Entity\Comment;
use Ramsey\Uuid\UuidInterface;
use App\Entity\Image;
use Doctrine\Common\Collections\Collection;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Video;

/**
 * Interface TrickInterface
 * @package App\Entity\Interfaces
 */
interface TrickInterface
{
    /**
     * TrickInterface constructor.
     */
    public function __construct();

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @return Image|null
     */
    public function getDefaultImage(): ?Image;

    /**
     * @return Collection
     */
    public function getComments():Collection;

    /**
     * @return User|null
     */
    public function getAuthor(): ?User;

    /**
     * @return Category|null
     */
    public function getCategory(): ?Category;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime;

    /**
     * @param UuidInterface $id
     * @return mixed
     */
    public function setId(UuidInterface $id);

    /**
     * @param string $name
     * @return mixed
     */
    public function setName(string $name);

    /**
     * @param string $description
     * @return mixed
     */
    public function setDescription(string $description);

    /**
     * @param Image|null $defaultImage
     * @return mixed
     */
    public function setDefaultImage(?Image $defaultImage);

    /**
     * @param Comment $comments
     * @return mixed
     */
    public function setComments(Comment $comments);

    /**
     * @param User|null $author
     * @return mixed
     */
    public function setAuthor(?User $author);

    /**
     * @param Category|null $category
     * @return mixed
     */
    public function setCategory(?Category $category);

    /**
     * @param \DateTime $createdAt
     * @return mixed
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * @param \DateTime $updatedAt
     * @return mixed
     */
    public function setUpdatedAt(?\DateTime $updatedAt);

    /**
     * @return Collection
     */
    public function getImages(): Collection;

    /**
     * @param Image $image
     * @return mixed
     */
    public function addImage(Image $image);

    /**
     * @param Image $image
     * @return mixed
     */
    public function removeImage(Image $image);

    /**
     * @return Collection
     */
    public function getVideos(): Collection;

    /**
     * @param Video $video
     * @return mixed
     */
    public function addVideo(Video $video);

    /**
     * @param Video $video
     * @return mixed
     */
    public function removeVideo(Video $video);

    /**
     * @return string|null
     */
    public function getSlug(): ?string;

    /**
     * @param string $slug
     * @return mixed
     */
    public function setSlug(?string $slug);

}