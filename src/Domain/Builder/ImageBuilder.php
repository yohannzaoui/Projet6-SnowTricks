<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 22:44
 */

namespace App\Domain\Builder;

use App\Domain\Models\Image;


class ImageBuilder
{
    /**
     * @var
     */
    private $image;

    /**
     * @param $image
     * @return $this
     * @throws \Exception
     */
    public function create($image)
    {
        $this->image = new Image($image);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

}