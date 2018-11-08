<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:45
 */

namespace App\Controller\Interfaces;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DeleteCategoryControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteCategoryControllerInterface
{
    /**
     * DeleteCategoryControllerInterface constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository);

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}