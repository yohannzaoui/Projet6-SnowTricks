<?php

namespace App\UI\Action\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\CategoryTypeHandlerInterface;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;
use App\Domain\Repository\CategoryRepository;

/**
 * Interface CategoryActionInterface
 * @package App\UI\Action\Interfaces
 */
interface CategoryActionInterface
{
    /**
     * CategoryActionInterface constructor.
     * @param FormFactoryInterface $formFactory
     * @param CategoryTypeHandlerInterface $categoryTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, CategoryTypeHandlerInterface $categoryTypeHandler, CategoryRepository $categoryRepository);

    /**
     * @param Request $request
     * @param CategoryActionResponderInterface $responder
     * @param ObjectManager $manager
     * @return mixed
     */
    public function __invoke(Request $request, CategoryActionResponderInterface $responder, ObjectManager $manager);
}