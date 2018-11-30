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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteCategoryController
 * @package App\Controller
 */
class DeleteCategoryController implements DeleteCategoryControllerInterface
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * DeleteCategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param SessionInterface $messageFlash
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        SessionInterface $messageFlash,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->messageFlash = $messageFlash;
        $this->urlGenerator = $urlGenerator;
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

            $this->messageFlash->getFlashBag()->add('deleteCategory',
                'Catégorie supprimée');

            return new RedirectResponse($this->urlGenerator->generate('category'), 302);
        }
    }
}