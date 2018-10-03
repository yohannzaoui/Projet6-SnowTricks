<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use App\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    /**
     * @Route("/tricks/details/{id}", name="trick")
     */
    public function index(Request $request, ObjectManager $manager, $id)
    {
        $Manager = $this->getDoctrine()->getManager();
        $trick = $Manager->getRepository(Trick::class)->find($id);

        $comment = new Comment;

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime)
                    ->setTrick($trick);
            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('trick', [
                'id' => $id
            ]);
        }

        return $this->render('trick/index.html.twig', [
            'title' => $trick->getName(),
            'trick' => $trick,
            'form' => $form->createView()
        ]);
    }
}