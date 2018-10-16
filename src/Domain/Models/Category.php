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
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $trick;

    /**
     * Category constructor.
     * @throws \Exception
     */
    public function __construct($name = null, $description = null)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->description = $description;
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

    /**
     * Get the value of trick
     */ 
    public function getTrick()
    {
        return $this->trick;
    }

    /**
     * Set the value of trick
     *
     * @return  self
     */ 
    public function setTrick($trick)
    {
        $this->trick = $trick;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }
}