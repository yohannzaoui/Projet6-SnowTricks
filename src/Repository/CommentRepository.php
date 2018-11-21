<?php

namespace App\Repository;

use App\Entity\Comment;
use App\Repository\Interfaces\CommentRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class CommentRepository
 * @package App\Domain\Repository
 */
final class CommentRepository extends ServiceEntityRepository implements CommentRepositoryInterface
{
    /**
     * CommentRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }


    /**
     * @param Comment $comment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Comment $comment)
    {
        $this->_em->persist($comment);
        $this->_em->flush();
    }
}