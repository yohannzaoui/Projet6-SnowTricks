<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/11/2018
 * Time: 22:31
 */

namespace App\FormHandler;


use App\Entity\Category;
use App\FormHandler\Interfaces\CategoryHandlerInterface;
use App\Repository\CategoryRepository;
use App\Repository\Interfaces\CategoryRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class CategoryHandler
 * @package App\FormHandler
 */
class CategoryHandler implements CategoryHandlerInterface
{

    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * CategoryHandler constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        SessionInterface $messageFlash
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @param Category $category
     * @return bool|mixed
     */
    public function handle(FormInterface $form, Category $category)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $category->setName($form->getData()->getname());

            $this->categoryRepository->save($category);

            $this->messageFlash->getFlashBag()->add('category', 'Catégorie ajoutée');

            return true;
        }
        return false;
    }
}
