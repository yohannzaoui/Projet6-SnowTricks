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
     * @return mixed
     */
    public function getImage();
}