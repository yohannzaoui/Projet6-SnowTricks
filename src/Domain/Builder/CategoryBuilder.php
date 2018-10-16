<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 15/10/2018
 * Time: 12:28
 */

namespace App\Domain\Builder;


use App\Domain\Models\Category;

/**
 * Class CategoryBuilder
 * @package App\Domain\Builder
 */
class CategoryBuilder
{
    /**
     * @var
     */
    private $category;

    /**
     * @param $name
     * @param $description
     * @return $this
     * @throws \Exception
     */
    public function createFromCategory($name, $description)
    {
        $this->category = new Category($name, $description);
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