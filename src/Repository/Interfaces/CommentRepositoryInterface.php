<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 21:19
 */

namespace App\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Comment;

/**
 * Interface CommentRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface CommentRepositoryInterface
{
    /**
     * CommentRepositoryInterface constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function save(Comment $comment);
}