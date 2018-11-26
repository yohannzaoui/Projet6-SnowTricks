<?php

namespace App\Repository;

use App\Entity\Category;
use App\Repository\Interfaces\CategoryRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class CategoryRepository
 * @package App\Domain\Repository
 */
class CategoryRepository extends ServiceEntityRepository implements CategoryRepositoryInterface
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
            ->delete(Category::class, 'c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCategory($id)
    {
        return $this->createQueryBuilder('category')
            ->Where($id)
            ->getQuery();

    }
}