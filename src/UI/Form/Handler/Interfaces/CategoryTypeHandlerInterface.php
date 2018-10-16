<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use App\Domain\Builder\CategoryBuilder;
use App\Domain\Repository\CategoryRepository;

/**
 * Interface CategoryTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface CategoryTypeHandlerInterface
{
    /**
     * CategoryTypeHandlerInterface constructor.
     *
     */
    public function __construct(CategoryBuilder $categoryBuilder, CategoryRepository $categoryRepository);

    /**
     * @param FormInterface $form
     * @param $category
     * @return mixed
     */
    public function handle(FormInterface $form);
}