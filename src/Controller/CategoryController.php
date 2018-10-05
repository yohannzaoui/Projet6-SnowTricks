<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @Route("/categories", name="category", methods={"GET"})
     */
    public function index(Request $request, ObjectManager $manager)
    {
        $category = new Category;

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($category);
            $manager->flush();
        }
        
        return $this->render('category/index.html.twig', [
            'title' => 'Gestion des catégories',
            'form' => $form->createView()
        ]);
    }
}