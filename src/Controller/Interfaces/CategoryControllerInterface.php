<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 16:39
 */

namespace App\Controller\Interfaces;

use App\FormHandler\Interfaces\CategoryHandlerInterface;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Category;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\Form\FormFactoryInterface;

/**
 * Interfaces CategoryControllerInterface
 * @package App\Controller\Interfaces
 */
interface CategoryControllerInterface
{
    /**
     * CategoryControllerInterface constructor.
     * @param CategoryRepository $categoryRepository
     * @param CategoryHandlerInterface $categoryHandler
     * @param Environment $twig
     * @param FormFactoryInterface $formFactory
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function  __construct(
        CategoryRepository $categoryRepository,
        CategoryHandlerInterface $categoryHandler,
        Environment $twig,
        FormFactoryInterface $formFactory,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param Request $request
     * @param Category|null $category
     * @return mixed
     */
    public function index(Request $request, Category $category = null);
}