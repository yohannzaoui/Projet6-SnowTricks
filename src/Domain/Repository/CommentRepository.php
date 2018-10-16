<?php

namespace App\Domain\Repository;

use App\Domain\Models\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function getAllComments()
    {
        $query = $this->_em->createQuery('SELECT c FROM App\Domain\Models\Comment ORDER BY c.createdAt DESC');

        $query->getResult();
    }
}