<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 21:26
 */

namespace App\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Trick;

/**
 * Interfaces TrickRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface TrickRepositoryInterface
{
    /**
     * TrickRepositoryInterface constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @return mixed
     */
    public function getAllTricks();

    /**
     * @param $id
     * @return mixed
     */
    public function getTrick($id);

    /**
     * @param $slug
     * @return mixed
     */
    public function getTrickBySlug($slug);

    /**
     * @param $id
     * @return mixed
     */
    public function getDefaultImage($id);

    /**
     * @param Trick $trick
     * @return mixed
     */
    public function save(Trick $trick);

    /**
     * @return mixed
     */
    public function update();

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);
}