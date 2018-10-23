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
     * NewCategoryDTO constructor.
     * @param $name
     * @param $trick
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    
}