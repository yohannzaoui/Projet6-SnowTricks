<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 21:13
 */

namespace App\Repository\Interfaces;

use Symfony\Bridge\Doctrine\RegistryInterface;
use App\Entity\Category;


/**
 * Interface CategoryRepositoryInterface
 * @package App\Repository\Interfaces
 */
interface CategoryRepositoryInterface
{
    /**
     * CategoryRepositoryInterface constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry);

    /**
     * @return mixed
     */
    public function getAllCategory();

    /**
     * @param Category $category
     * @return mixed
     */
    public function save(Category $category);

    /**
     * @return mixed
     */
    public function update();

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @return mixed
     */
    public function getCategory($id);
}