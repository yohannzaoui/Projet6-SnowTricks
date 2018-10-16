<?php

namespace App\Domain\Repository;

use App\Domain\Models\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class CategoryRepository
 * @package App\Domain\Repository
 */
class CategoryRepository extends ServiceEntityRepository
{
    /**
     * CategoryRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    /**
     * @return mixed
     */
    public function getAllCategory()
    {
        return $this->createQueryBuilder('category')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Category $category
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Category $category)
    {
        $this->_em->persist($category);
        $this->_em->flush();
    }

    /**
     * @param Category $category
     * @throws \Doctrine\ORM\ORMException
     */
    public function delete(Category $category)
    {
        $this->_em->remove($category);
        $this->_em->flush();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        return $this->createQueryBuilder('category')
            ->andWhere($id)
            ->getQuery();

    }
}