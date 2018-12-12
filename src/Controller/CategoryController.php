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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryController
 * @package App\Controller
 */
class CategoryController implements CategoryControllerInterface
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
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;


    /**
     * CategoryController constructor.
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
    ) {
      $this->categoryRepository = $categoryRepository;
      $this->categoryHandler = $categoryHandler;
      $this->twig = $twig;
      $this->formFactory = $formFactory;
      $this->urlGenerator = $urlGenerator;
    }

    /**
     * @Route("/category", name="category", methods={"GET", "POST"})
     * @Route("/editCategory/{id}", name="editCategory", methods={"GET", "POST"})
     * @IsGranted("ROLE_ADMIN")
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

        $categories = $this->categoryRepository->getAllCategory();

        $form = $this->formFactory->create(CategoryType::class, $category)
            ->handleRequest($request);

        if ($this->categoryHandler->handle($form, $category)) {

            return new RedirectResponse($this->urlGenerator->generate('category'), 302);
        }

        return new Response($this->twig->render('admin/category.html.twig', [
                'categories' => $categories,
                'editMode' => $request->get('id') !== null,
                'form' => $form->createView()
            ]), 200);
    }
}