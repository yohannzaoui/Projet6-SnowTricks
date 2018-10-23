<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 13/10/2018
 * Time: 18:04
 */

namespace App\Domain\Builder;


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
    public function create($name, $description, $category)
    {
        $this->trick = new Trick($name, $description, $category);
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