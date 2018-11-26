<?php

namespace App\Repository;

use App\Entity\Comment;
use App\Repository\Interfaces\CommentRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Class CommentRepository
 * @package App\Domain\Repository
 */
class CommentRepository extends ServiceEntityRepository implements CommentRepositoryInterface
{
    /**
     * CommentRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }


    /*public function getComments($id)
    {
        return $this->createQueryBuilder('comment')
            ->where('comment.trick = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult();
    }*/

    public function getComments($id, $page, $max)
    {
        $qb = $this->createQueryBuilder('comment');
        $qb->setFirstResult(($page-1) * $max)
            ->where('comment.trick = :id')
            ->setParameter('id', $id)
            ->orderBy('comment.createdAt','DESC')
            ->setMaxResults($max);

        return new Paginator($qb);
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