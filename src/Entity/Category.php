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
    public function getId(): UuidInterface
    {
        return $this->id;
    }


    /**
     * @param UuidInterface $id
     * @return mixed|void
     */
    public function setId(UuidInterface $id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * @param $name
     * @return mixed|void
     */
    public function setName(?string $name)
    {
        $this->name = $name;
    }




}