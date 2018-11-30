<?php

namespace App\Entity;

use App\Entity\Interfaces\CategoryInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;


/**
 * Class Category
 * @package App\Entity
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
    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }


    /**
     * @return mixed|UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @param $name
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
    }




}