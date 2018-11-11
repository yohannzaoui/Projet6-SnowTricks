<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 16:07
 */

namespace App\Controller;


use App\Controller\Interfaces\CategoryControllerInterface;
use App\Entity\Category;
use App\Form\AddCategoryType;
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
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function  __construct(
        CategoryRepository $categoryRepository
    ) {
      $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/category", name="category", methods={"GET"})
     * @Route("/editCategory/{id}", name="editCategory", methods={"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function index(Request $request, Category $category = null)
    {
        if (!$category) {

            $category = new Category;
        }

        $categorysList = $this->categoryRepository->getAllCategory();

        $form = $this->createForm(AddCategoryType::class, $category)
            ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $category->setName($form->getData()->getname());

            $this->categoryRepository->save($category);

            $this->addFlash('category',
                'Catégorie ajoutée');

            return $this->redirectToRoute('category');
        }
        return $this->render('admin/category.html.twig', [
            'categorysList' => $categorysList,
            'editMode' => $request->attributes->get('id') !== null,
            'form' => $form->createView()
        ]);
    }
}