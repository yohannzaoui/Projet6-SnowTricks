<?php

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewTrickDTOInterface;

/**
 * Class NewTrickDTO
 * @package App\Domain\DTO
 */
class NewTrickDTO implements NewTrickDTOInterface
{

    public $name;
    
    public $description;

    public $image;

    public $video;

    public $category;



    public function __construct(
        $name = null,
        $description = null,
        NewImageDTO $image = null,
        NewVideoDTO $video = null,
        $category = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->video = $video;
        $this->category = $category;
    }


}