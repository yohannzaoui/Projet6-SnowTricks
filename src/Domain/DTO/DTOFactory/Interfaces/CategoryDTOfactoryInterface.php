<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 13:26
 */

namespace App\Domain\DTO\DTOFactory\Interfaces;


interface CategoryDTOfactoryInterface
{
    public function create($name);
}