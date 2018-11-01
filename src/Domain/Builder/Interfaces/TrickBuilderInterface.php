<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 10:03
 */

namespace App\Domain\Builder\Interfaces;

use App\Domain\Models\Category;

/**
 * Interface TrickBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface TrickBuilderInterface
{


    /**
     * @param $author
     * @param $name
     * @param $description
     * @param $defaultImage
     * @param array $images
     * @param array $videos
     * @param Category $category
     * @return mixed
     */
    public function create($author, $name, $description, $defaultImage, array $images, array $videos, Category $category);

    /**
     * @return mixed
     */
    public function getTrick();
}