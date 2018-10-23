<?php

namespace App\Domain\Models;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Category
 * @package App\Domain\Models
 */
class Category
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
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nameGroup
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


}