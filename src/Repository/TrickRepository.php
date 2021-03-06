<?php

namespace App\Repository;

use App\Entity\Trick;
use App\Repository\Interfaces\TrickRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 *
 * Class TrickRepository
 * @package App\Domain\Repository
 */
class TrickRepository extends ServiceEntityRepository implements TrickRepositoryInterface
{

    /**
     * TrickRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Trick::class);
    }


    /**
     * @return mixed
     */
    public function getAllTricks()
    {
        return $this->createQueryBuilder('t')
                     ->orderBy('t.createdAt','DESC')
                     ->getQuery()
                     ->getResult();
    }


    /**
     * @param int $page
     * @param int $max
     * @return Paginator
     */
    public function getTricks($page, $max)
    {
        $qb = $this->createQueryBuilder('trick');
        $qb->setFirstResult(($page-1) * $max)
            ->orderBy('trick.createdAt','DESC')
            ->setMaxResults($max);

        return new Paginator($qb);
    }


    /**
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getTrick($id)
    {
        return $this->createQueryBuilder('trick')
                    ->where('trick.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param $slug
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getTrickBySlug($slug)
    {
        return $this->createQueryBuilder('trick')
            ->where('trick.slug = :slug')
            ->setParameter('slug', $slug)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getDefaultImage($id)
    {
        return $this->createQueryBuilder('trick')
            ->select('trick.defaultImage')
            ->where('trick.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function checkDefaultImage($id)
    {
        return $this->createQueryBuilder('trick')
            ->select('trick.defaultImage')
            ->where('trick.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param Trick $trick
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Trick $trick)
    {
        $this->_em->persist($trick);
        $this->_em->flush();
    }


    /**
     * @return mixed|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update()
    {
        $this->_em->flush();
    }


    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->_em->createQueryBuilder()
            ->delete(Trick::class, 't')
            ->where('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

}

