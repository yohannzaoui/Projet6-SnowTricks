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

/**
 * Interfaces CommentInterface
 * @package App\Entity\Interfaces
 */
interface CommentInterface
{
    /**
     * CommentInterface constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getMessage();

    /**
     * @param $message
     * @return mixed
     */
    public function setMessage($message);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @param $createdAt
     * @return mixed
     */
    public function setCreatedAt($createdAt);

    /**
     * @return mixed
     */
    public function getTrick();

    /**
     * @param Trick $trick
     * @return mixed
     */
    public function setTrick(Trick $trick);

    /**
     * @return mixed
     */
    public function getAuthor();

    /**
     * @param User $author
     * @return mixed
     */
    public function setAuthor(User $author);
}