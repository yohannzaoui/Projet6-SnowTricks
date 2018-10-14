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
        return $this->createQueryBuilder('trick')
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
                    ->andWhere($id)
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

}

