<?php

namespace App\Controller;

use App\Entity\Group;
use App\Form\GroupType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupController extends AbstractController
{
    /**
     * @Route("/groupes", name="group")
     */
    public function index(Request $request, ObjectManager $manager)
    {
        $group = new Group;

        $form = $this->createForm(GroupType::class, $group);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($group);
            $manager->flush();
        }
        
        return $this->render('group/index.html.twig', [
            'title' => 'Gestion des groupes',
            'form' => $form->createView()
        ]);
    }
}