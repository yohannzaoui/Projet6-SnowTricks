<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 21:56
 */

namespace App\Domain\Repository;

use App\Domain\Models\Media;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * Class MediaRepository
 * @package App\Domain\Repository
 */
class MediaRepository extends ServiceEntityRepository
{
    /**
     * MediaRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Media::class);
    }

    /**
     * @param Media $media
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Media $media)
    {
        $this->_em->persist($media);
        $this->_em->flush();
    }


}