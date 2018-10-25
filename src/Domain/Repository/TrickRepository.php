<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Models\Trick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 *
 * Class TrickRepository
 * @package App\Domain\Repository
 */
class TrickRepository extends ServiceEntityRepository
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
     * @param $id
     * @return mixed
     */
    public function getTrick($id)
    {
        return $this->createQueryBuilder('trick')
                    ->where('trick.id = :id')
                    ->setParameter('id', $id)
                    ->getQuery();

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
     * @param Trick $trick
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

