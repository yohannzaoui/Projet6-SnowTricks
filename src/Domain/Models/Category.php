<?php

namespace App\Domain\Models;

use App\Domain\Models\Interfaces\CategoryInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Category
 * @package App\Domain\Models
 */
class Category implements CategoryInterface
{
    /**
     * @var UuidInterface
     */
    private $id;
    /**
     * @var
     */
    private $name;


    /**
     * Category constructor.
     * @throws \Exception
     */
    public function __construct($name)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nameGroup
     */ 
    public function getName()
    {
        return $this->name;
    }


}