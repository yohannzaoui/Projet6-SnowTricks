<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 08:28
 */

namespace App\Entity\Interfaces;


use Ramsey\Uuid\UuidInterface;

/**
 * Interface CategoryInterface
 * @package App\Entity\Interfaces
 */
interface CategoryInterface
{


    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface;


    /**
     * @return mixed
     */
    public function getName(): ?string;


    /**
     * @param UuidInterface $id
     * @return mixed
     */
    public  function setId(UuidInterface $id);


    /**
     * @param $name
     * @return mixed
     */
    public function setName(string $name);

}