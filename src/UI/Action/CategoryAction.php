<?php

namespace App\UI\Action;

use App\UI\Form\CategoryType;
use App\Domain\Models\Category;
use App\UI\Responder\CategoryActionResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Action\Interfaces\CategoryActionInterface;


class CategoryAction implements CategoryActionInterface
{

    private $formFactory;
    private $categoryTypeHandler;

    public function __construct(FormFactoryInterface $formFactory,
        CategoryTypeHandlerInterface $categoryTypeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->categoryTypeHandler = $categoryTypeHandler;
    }

    /**
     * @Route("/admin", name="category", methods={"GET","POST"})
     */
    public function __invoke(Request $request, CategoryActionResponderInterface $responder, ObjectManager $manager)
    {
        $category = new Category;
        $categoryList = $manager->getRepository(Category::class)->findAll();
        $form = $this->formFactory->create(CategoryType::class, $category)->handleRequest($request);

        if ($this->categoryTypeHandler->handle($form, $category)) {
            return $responder(true, $form, $categoryList);
        }
        return $responder(false, $form, $categoryList);
    }
}