<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 09:31
 */

namespace App\Domain\DTO;


/**
 * Class NewUpdateTrickDTO
 * @package App\Domain\DTO
 */
class NewUpdateTrickDTO
{

    /**
     * @var
     */
    public $author;


    /**
     * @var
     */
    public $name;


    /**
     * @var
     */
    public $description;


    /**
     * @var
     */
    public $defaultImage;


    /**
     * @var
     */
    public $images;


    /**
     * @var
     */
    public $videos;


    /**
     * @var
     */
    public $category;

    /**
     * NewUpdateTrickDTO constructor.
     * @param $author
     * @param $name
     * @param $description
     * @param $defaultImage
     * @param $images
     * @param $videos
     * @param $category
     */
    public function __construct(
        $author,
        $name,
        $description,
        $defaultImage,
        $images,
        $videos,
        $category
    ) {
        $this->author = $author;
        $this->name = $name;
        $this->description = $description;
        $this->defaultImage = $defaultImage;
        $this->images = $images;
        $this->videos= $videos;
        $this->category = $category;
    }
}