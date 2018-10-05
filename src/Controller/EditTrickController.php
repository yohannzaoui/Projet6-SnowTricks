<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Form\EditTrickType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EditTrickController extends AbstractController
{

    /**
     * @Route("/ajouterTrick", name="addtrick", methods={"GET","POST"})
     * @Route("/modifierTrick/{id}", name="updatetrick", methods={"GET","POST"})
     */
    public function edit(Request $request, ObjectManager $manager, Trick $trick = null)
    {

        if (!$trick) {
            $trick = new Trick();
        }
        
        $form = $this->createForm(EditTrickType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$trick->getId()) {
                $trick->setCreatedAt(new \DateTime());
            } else {
                $trick->setUpdatedAt(new \DateTime());
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