<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 22/10/2018
 * Time: 13:11
 */

namespace App\Domain\Builder\Interfaces;


/**
 * Interface ImageBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface ImageBuilderInterface
{
    /**
     * @param $fileName
     * @return mixed
     */
    public function create($fileName);

    /**
     * @param $fileName
     * @return mixed
     */
    public function createProfileImage($fileName);

    /**
     * @return mixed
     */
    public function getDefaultImage();

    /**
     * @return mixed
     */
    public function getProfilImage();

    /**
     * @param array $files
     * @return mixed
     */
    public function createFromArray(array $files);

    /**
     * @return mixed
     */
    public function getImages();
}