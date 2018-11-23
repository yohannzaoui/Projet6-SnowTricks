<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 16:07
 */

namespace App\Controller;


use App\Controller\Interfaces\CategoryControllerInterface;
use App\FormHandler\Interfaces\CategoryHandlerInterface;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryController
 * @package App\Controller
 */
final class CategoryController extends AbstractController implements CategoryControllerInterface
{

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var CategoryHandlerInterface
     */
    private $categoryHandler;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param CategoryHandlerInterface $categoryHandler
     */
    public function  __construct(
        CategoryRepository $categoryRepository,
        CategoryHandlerInterface $categoryHandler
    ) {
      $this->categoryRepository = $categoryRepository;
      $this->categoryHandler = $categoryHandler;
    }

    /**
     * @Route("/category", name="category", methods={"GET", "POST"})
     * @Route("/editCategory/{id}", name="editCategory", methods={"GET", "POST"})
     * @param Request $request
     * @param Category|null $category
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function index(Request $request, Category $category = null)
    {
        if (!$category) {

            $category = new Category;
        }

        $categoriesList = $this->categoryRepository->getAllCategory();

        $form = $this->createForm(CategoryType::class, $category)
            ->handleRequest($request);

        if ($this->categoryHandler->handle($form, $category)) {

            return $this->redirectToRoute('category');
        }
        return $this->render('admin/category.html.twig', [
            'categoriesList' => $categoriesList,
            'editMode' => $request->attributes->get('id') !== null,
            'form' => $form->createView()
        ]);
    }
}