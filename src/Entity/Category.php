<?php

namespace App\Entity;

use App\Entity\Interfaces\CategoryInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


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
    public function __construct()
    {
        $this->id = Uuid::uuid4();
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

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


}