<?php

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewTrickDTOInterface;

/**
 * Class NewTrickDTO
 * @package App\Domain\DTO
 */
class NewTrickDTO implements NewTrickDTOInterface
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
     * @var NewDefaultImageDTO
     */
    public $defaultImage;

    /**
     * @var NewImageDTO
     */
    public $images;

    /**
     * @var NewVideoDTO
     */
    public $videos;

    /**
     * @var
     */
    public $category;


    /**
     * NewTrickDTO constructor.
     * @param $author
     * @param $name
     * @param $description
     * @param NewDefaultImageDTO $defaultImage
     * @param NewImageDTO $images
     * @param NewVideoDTO $videos
     * @param $category
     */
    public function __construct(
        $author,
        $name,
        $description,
        NewDefaultImageDTO $defaultImage,
        NewImageDTO $images,
        NewVideoDTO $videos,
        $category
    ) {
        $this->author = $author;
        $this->name = $name;
        $this->description = $description;
        $this->defaultImage = $defaultImage;
        $this->images = $images;
        $this->videos = $videos;
        $this->category = $category;
    }


}