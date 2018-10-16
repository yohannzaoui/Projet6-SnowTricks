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
     * @var null
     */
    public $name;


    /**
     * @var null
     */
    public $description;


    /**
     * @var null
     */
    public $image;


    /**
     * @var null
     */
    public $video;

    public $category;


    /**
     * NewTrickDTO constructor.
     * @param null $name
     * @param null $description
     * @param null $image
     * @param null $video
     */
    public function __construct($name = null, $description = null, $image = null, $video = null, $category = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->video = $video;
        $this->category = $category;
    }


}