<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 15/10/2018
 * Time: 12:28
 */

namespace App\Domain\Builder;


use App\Domain\Builder\Interfaces\CategoryBuilderInterface;
use App\Domain\Models\Category;

/**
 * Class CategoryBuilder
 * @package App\Domain\Builder
 */
class CategoryBuilder implements CategoryBuilderInterface
{
    /**
     * @var
     */
    private $category;

    /**
     * @param $name
     * @return $this
     * @throws \Exception
     */
    public function createFromCategory($name)
    {
        $this->category = new Category($name);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

}