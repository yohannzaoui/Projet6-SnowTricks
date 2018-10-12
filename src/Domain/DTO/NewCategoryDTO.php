<?php

namespace App\Domain\DTO;

class NewCategoryDTO
{
    public $name;
    

    public $description;
    

    public $trick;
    

    public function __construct($name, $description, $trick)
    {
        $this->name = $name;
        $this->description = $description;
        $this->trick = $trick;
    }

    
}