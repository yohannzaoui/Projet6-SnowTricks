<?php

namespace App\UI\Action;

use App\Domain\Repository\CategoryRepository;
use App\UI\Form\AddCategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;
use App\UI\Action\Interfaces\CategoryActionInterface;

/**
 * Class CategoryAction
 * @package App\UI\Action
 */
class CategoryAction implements CategoryActionInterface
{

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var CategoryTypeHandlerInterface
     */
    private $categoryTypeHandler;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param CategoryTypeHandlerInterface $categoryTypeHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CategoryTypeHandlerInterface $categoryTypeHandler,
        CategoryRepository $categoryRepository
    ) {
        $this->formFactory = $formFactory;
        $this->categoryTypeHandler = $categoryTypeHandler;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @Route("/admin", name="category", methods={"GET","POST"})
     * @param Request $request
     * @param CategoryActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, CategoryActionResponderInterface $responder)
    {

        $categoryList = $this->categoryRepository->getAllCategory();
        $form = $this->formFactory->create(AddCategoryType::class)->handleRequest($request);

        if ($this->categoryTypeHandler->handle($form)) {
            return $responder(true, $form, $categoryList);
        }
        return $responder(false, $form, $categoryList);
    }
}