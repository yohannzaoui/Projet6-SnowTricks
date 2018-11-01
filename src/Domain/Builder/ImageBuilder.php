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
    private $defaultImage;

    /**
     * @var
     */
    private $profilImage;

    /**
     * @var
     */
    private $images;

    /**
     * @param $fileName
     * @return $this|mixed
     * @throws \Exception
     */
    public function create($fileName)
    {
        $this->defaultImage = new Image($fileName);
        return $this->defaultImage;
    }

    /**
     * @param $fileName
     * @return Image|mixed
     * @throws \Exception
     */
    public function createProfileImage($fileName)
    {
        $this->profilImage = new Image($fileName);
        return $this->profilImage;
    }

    public function getProfilImage()
    {
        return $this->profilImage;
    }

    /**
     * @return mixed
     */
    public function getDefaultImage()
    {
        return $this->defaultImage;
    }

    /**
     * @param array $files
     * @return array|mixed
     * @throws \Exception
     */
    public function createFromArray(array $files)
    {
        $images = [];

        foreach ($files as $file) {
            $images[] = new Image($file);
        }
        return $images;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }


}