<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 00:44
 */

namespace App\Domain\Builder\Interfaces;


/**
 * Interface CategoryBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface CategoryBuilderInterface
{
    /**
     * @param $name
     * @return mixed
     */
    public function createFromCategory($name);

    /**
     * @return mixed
     */
    public function getCategory();
}