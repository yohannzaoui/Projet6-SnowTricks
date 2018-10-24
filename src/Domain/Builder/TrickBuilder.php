<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/10/2018
 * Time: 18:04
 */

namespace App\Domain\Builder;


use App\Domain\Builder\Interfaces\ImageBuilderInterface;
use App\Domain\Builder\Interfaces\VideoBuilderInterface;
use App\Domain\Models\Category;
use App\Domain\Models\Trick;

/**
 * Class TrickBuilder
 * @package App\Domain\Builder
 */
class TrickBuilder
{
    /**
     * @var
     */
    private $trick;


    /**
     * @param $name
     * @param $description
     * @param $image
     * @param $video
     * @return $this
     * @throws \Exception
     */
    public function create($name, $description, ImageBuilderInterface $image, VideoBuilderInterface $video, Category $category)
    {
        $this->trick = new Trick($name, $description, $image->getImage(), $video->getVideo(), $category);
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