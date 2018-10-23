<?php

namespace App\UI\Form\Handler;

use App\Domain\Builder\CategoryBuilder;
use App\Domain\Repository\CategoryRepository;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;


/**
 * Class CategoryTypeHandler
 * @package App\UI\Form\Handler
 */
class CategoryTypeHandler implements CategoryTypeHandlerInterface
{

    /**
     * @var ObjectManager
     */
    private $categoryRepository;

    /**
     * @var CategoryBuilder
     */
    private $categoryBuilder;

    /**
     * CategoryTypeHandler constructor.
     * @param ObjectManager $manager
     */
    public function __construct(
        CategoryBuilder $categoryBuilder,
        CategoryRepository $categoryRepository
    ) {
        $this->categoryBuilder = $categoryBuilder;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * @param FormInterface $form
     * @return bool|mixed
     * @throws \Exception
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $this->categoryBuilder->createFromCategory($form->getData()->name);

            $this->categoryRepository->save($this->categoryBuilder->getCategory());

            return true;
        }
        return false;
    }
}