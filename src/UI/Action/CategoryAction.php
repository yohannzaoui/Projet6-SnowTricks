<?php

namespace App\UI\Action;

use App\Domain\Repository\CategoryRepository;
use App\UI\Form\CategoryType;
//use App\Domain\Models\Category;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Action\Interfaces\CategoryActionInterface;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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

    private $categoryRepository;

    /**
     * CategoryAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param CategoryTypeHandlerInterface $categoryTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory,
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
     * @param ObjectManager $manager
     * @return mixed
     */
    public function __invoke(Request $request, CategoryActionResponderInterface $responder, ObjectManager $manager)
    {

        $categoryList = $this->categoryRepository->getAllCategory();
        $form = $this->formFactory->create(CategoryType::class)->handleRequest($request);

        if ($this->categoryTypeHandler->handle($form)) {
            return $responder(true, $form, $categoryList);
        }
        return $responder(false, $form, $categoryList);
    }
}