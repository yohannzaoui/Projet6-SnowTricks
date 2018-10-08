<?php

namespace App\Domain\DTO;

class NewTrickDTO
{
    public $name;
    

    public $description;
    

    public $image;
    

    public $video;
    

    public $comment;
    

    public $category;
    
    
    public $createdAt;
    

    public $updatedAt;
    

    public function __construct($name, $description, $image, $video, $comment, $category, $createdAt, $updatedAt)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->video = $video;
        $this->comment = $comment;
        $this->category = $category;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }


}