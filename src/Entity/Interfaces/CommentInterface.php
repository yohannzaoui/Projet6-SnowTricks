<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 22:07
 */

namespace App\Entity\Interfaces;

use App\Entity\Trick;
use App\Entity\User;
use Ramsey\Uuid\UuidInterface;


/**
 * Interface CommentInterface
 * @package App\Entity\Interfaces
 */
interface CommentInterface
{

    /**
     * CommentInterface constructor.
     */
    public function __construct();


    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface;


    /**
     * @param UuidInterface $id
     * @return mixed
     */
    public function setId(UuidInterface $id);


    /**
     * @return string
     */
    public function getMessage(): ?string ;


    /**
     * @param string $message
     * @return mixed
     */
    public function setMessage(?string $message);


    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime;


    /**
     * @param \DateTime $createdAt
     * @return mixed
     */
    public function setCreatedAt(\DateTime $createdAt);


    /**
     * @return Trick
     */
    public function getTrick(): Trick;


    /**
     * @param Trick $trick
     * @return mixed
     */
    public function setTrick(Trick $trick);


    /**
     * @return User
     */
    public function getAuthor(): User;


    /**
     * @param User $author
     * @return mixed
     */
    public function setAuthor(User $author);
}