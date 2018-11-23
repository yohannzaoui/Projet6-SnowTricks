<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 21:56
 */

namespace App\Repository;

use App\Entity\Image;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * Class ImageRepository
 * @package App\Domain\Repository
 */
class ImageRepository extends ServiceEntityRepository
{

    /**
     * ImageRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Image::class);
    }


    /**
     * @param $id
     * @return mixed
     */
    public function checkImages($id)
    {
        return $this->createQueryBuilder('i')
            ->select('i.url')
            ->where('i.trick = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getResult();
    }


    /**
     * @param Image $image
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Image $image)
    {
        $this->_em->persist($image);
        $this->_em->flush();
    }


}