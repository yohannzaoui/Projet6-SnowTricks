<?php

namespace App\Domain\DTO;

/**
 * Class NewCategoryDTO
 * @package App\Domain\DTO
 */
class NewCategoryDTO
{
    /**
     * @var
     */
    public $name;


    /**
     * @var
     */
    public $description;





    /**
     * NewCategoryDTO constructor.
     * @param $name
     * @param $description
     * @param $trick
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    
}