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
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interfaces DeleteCategoryControllerInterface
 * @package App\Controller\Interfaces
 */
interface DeleteCategoryControllerInterface
{
    /**
     * DeleteCategoryControllerInterface constructor.
     * @param CategoryRepository $categoryRepository
     * @param SessionInterface $messageFlash
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        SessionInterface $messageFlash,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}