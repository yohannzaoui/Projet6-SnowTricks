<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 15/10/2018
 * Time: 12:47
 */

namespace App\UI\Action;


use App\Domain\Repository\CategoryRepository;
use App\UI\Responder\Interfaces\DeleteCategoryActionResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DeleteCategoryAction
 * @package App\UI\Action
 */
class DeleteCategoryAction
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * @Route("/supprimerCategorie/{id}", name="delcategory", methods={"GET"})
     * @param Request $request
     * @param DeleteCategoryActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, DeleteCategoryActionResponderInterface $responder)
    {
        if ($request->get('id')){

            $this->categoryRepository->delete($request->get('id'));

            return $responder();
        }
    }
}