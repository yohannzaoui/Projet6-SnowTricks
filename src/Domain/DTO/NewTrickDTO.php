<?php

namespace App\Domain\DTO;

class NewTrickDTO
{
    public $name;
    

    public $description;
    

    public $image;
    

    public $video;

    

    public function __construct($name = null, $description = null, $image = null, $video = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->video = $video;
    }


}