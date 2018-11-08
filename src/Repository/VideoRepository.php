<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 23:12
 */

namespace App\Repository;


use App\Entity\Video;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * Class VideoRepository
 * @package App\Domain\Repository
 */
class VideoRepository extends ServiceEntityRepository
{
    /**
     * VideoRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Video::class);
    }

    /**
     * @param Video $video
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Video $video)
    {
        $this->_em->persist($video);
        $this->_em->flush();
    }
}