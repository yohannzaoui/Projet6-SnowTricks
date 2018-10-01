<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditTrickController extends AbstractController
{
    /**
     * @Route("/ajouterTrick", name="addtrick")
     * @Route("/modifierTrick/{id}", name="updatetrick")
     */
    public function edit(Request $request, ObjectManager $manager, Trick $trick = null)
    {

        if (!$trick) {
            $trick = new Trick();
        }
        
        $form = $this->createFormBuilder($trick)
            ->add('name', TextType::class)
            ->add('description', TextType::class)
            ->add('image', TextType::class)
            ->add('video', TextType::class)
            ->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$trick->getId()) {
                $trick->setCreatedAt(new \DateTime());
            }
            $manager->persist($trick);
            $manager->flush();
            return $this->redirectToRoute('trick', [
                'id' => $trick->getId()
            ]);
        }

        return $this->render('edit/index.html.twig', [
            'title' => 'Ajouter / modifier un Trick',
            'form' => $form->createView(),
            'editMode' => $trick->getId() !== null
        ]);
    }

    /**
     * @Route("/supprimerTrick/{id}", name="deltrick")
     */
    public function delete(ObjectManager $manager, $id)
    {
        $Manager = $this->getDoctrine()->getManager();
        $trick = $Manager->getRepository(Trick::class)->find($id);
        $manager->remove($trick);
        $manager->flush();
        return $this->redirectToRoute('home');
    }
}