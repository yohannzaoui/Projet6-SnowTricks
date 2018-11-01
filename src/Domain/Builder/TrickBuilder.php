<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/10/2018
 * Time: 18:04
 */

namespace App\Domain\Builder;


use App\Domain\Builder\Interfaces\TrickBuilderInterface;
use App\Domain\Models\Category;
use App\Domain\Models\Trick;

/**
 * Class TrickBuilder
 * @package App\Domain\Builder
 */
class TrickBuilder implements TrickBuilderInterface
{
    private $trick;

    /**
     * @param $author
     * @param $name
     * @param $description
     * @param $defaultImage
     * @param array $images
     * @param array $videos
     * @param Category $category
     * @return $this
     * @throws \Exception
     */
    public function create($author, $name, $description, $defaultImage, array $images, array $videos, Category $category)
    {
        $this->trick = new Trick($author, $name, $description, $defaultImage, $images, $videos, $category);
        return $this;
    }


    /**
     * @return mixed
     */
    public function getTrick()
    {
        return $this->trick;
    }
}