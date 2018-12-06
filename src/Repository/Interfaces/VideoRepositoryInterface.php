<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 21:30
 */

namespace App\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Video;

/**
 * Interfaces VideoRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface VideoRepositoryInterface
{
    /**
     * VideoRepositoryInterface constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param Video $video
     * @return mixed
     */
    public function save(Video $video);
}