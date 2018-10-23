<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 22:44
 */

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\ImageBuilderInterface;
use App\Domain\Models\Image;


/**
 * Class ImageBuilder
 * @package App\Domain\Builder
 */
class ImageBuilder implements ImageBuilderInterface
{

    /**
     * @var
     */
    private $image;


    /**
     * @param $fileName
     * @return $this
     * @throws \Exception
     */
    public function create($fileName)
    {
        $this->image = new Image($fileName);
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