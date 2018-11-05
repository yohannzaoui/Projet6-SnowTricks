<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 13:26
 */

namespace App\Domain\DTO\DTOFactory;


use App\Domain\DTO\DTOFactory\Interfaces\CategoryDTOfactoryInterface;
use App\Domain\DTO\NewCategoryDTO;

class CategoryDTOFactory implements CategoryDTOfactoryInterface
{
    public function create($name)
    {
        return new NewCategoryDTO($name);
    }
}