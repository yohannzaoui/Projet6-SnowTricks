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
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class CategoryHandler
 * @package App\FormHandler
 */
final class CategoryHandler implements CategoryHandlerInterface
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
     * CategoryHandler constructor.
     * @param CategoryRepository $categoryRepository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        CategoryRepository $categoryRepository,
        SessionInterface $messageFlash
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @param Category $category
     * @return bool|mixed
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
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
