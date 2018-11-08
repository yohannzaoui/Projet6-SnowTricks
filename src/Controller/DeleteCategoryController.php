<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 06/11/2018
 * Time: 15:08
 */

namespace App\Controller;


use App\Controller\Interfaces\DeleteCategoryControllerInterface;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DeleteCategoryController
 * @package App\Controller
 */
class DeleteCategoryController extends AbstractController implements DeleteCategoryControllerInterface
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * DeleteCategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        CategoryRepository $categoryRepository
    ) {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * @Route("/supprimerCategorie/{id}", name="delcategory", methods={"GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index(Request $request)
    {
        if ($request->attributes->get('id')) {

            $this->categoryRepository->delete($request->attributes->get('id'));

            $this->addFlash('deleteCategory',
                'Catégorie supprimée');

            return $this->redirectToRoute('category');
        }
    }
}