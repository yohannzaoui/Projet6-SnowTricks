<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:33
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewCategoryDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewCategoryDTOInterface
{
    /**
     * NewCategoryDTOInterface constructor.
     * @param $name
     * @param $description
     * @param $trick
     */
    public function __construct($name, $description, $trick);
}