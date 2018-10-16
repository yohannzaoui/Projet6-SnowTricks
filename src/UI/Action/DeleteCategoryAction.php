<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 15/10/2018
 * Time: 12:47
 */

namespace App\UI\Action;

use App\Domain\Models\Category;
use App\UI\Responder\Interfaces\DeleteCategoryActionResponderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class DeleteCategoryAction
 * @package App\UI\Action
 */
class DeleteCategoryAction
{


    /**
     * @Route("/supprimerCategorie/{id}", name="delcategory", methods={"GET"})
     * @param Request $request
     * @param DeleteCategoryActionResponderInterface $responder
     * @param ObjectManager $manager
     * @return mixed
     */
    public function __invoke(Request $request, DeleteCategoryActionResponderInterface $responder, ObjectManager $manager)
    {
        if ($request->get('id')){
            $category = $manager->getRepository(Category::class)->find($request->get('id'));

            $manager->remove($category);
            $manager->flush();


            return $responder();
        }
    }
}