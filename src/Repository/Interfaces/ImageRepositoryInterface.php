<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 21:24
 */

namespace App\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Image;

/**
 * Interfaces ImageRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface ImageRepositoryInterface
{
    /**
     * ImageRepositoryInterface constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @param $id
     * @return mixed
     */
    public function checkImages($id);

    /**
     * @param Image $image
     * @return mixed
     */
    public function save(Image $image);
}