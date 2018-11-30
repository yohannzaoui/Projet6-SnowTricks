<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/11/2018
 * Time: 22:54
 */

namespace App\FormHandler\Interfaces;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;
use App\Entity\Category;

/**
 * Interfaces CategoryHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface CategoryHandlerInterface
{
    /**
     * CategoryHandlerInterface constructor.
     * @param CategoryRepository $categoryRepository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @param Category $category
     * @return mixed
     */
    public function handle(FormInterface $form, Category $category);


}