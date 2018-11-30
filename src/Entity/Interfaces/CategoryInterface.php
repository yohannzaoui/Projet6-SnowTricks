<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 08:28
 */

namespace App\Entity\Interfaces;


/**
 * Interface CategoryInterface
 * @package App\Entity\Interfaces
 */
interface CategoryInterface
{


    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $id
     * @return mixed
     */
    public  function setId($id);

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

}