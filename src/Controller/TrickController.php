<?php

namespace App\Controller;

use App\Entity\Trick;
use App\Entity\Comment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
        $form = $this->createFormBuilder($comment)
                ->add('pseudo', TextType::class)
                ->add('message', TextareaType::class)
                ->getForm();
        $form->handleRequest($request);
        //dump($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt(new \DateTime);
            $comment->setTrick($id);
            $manager->persist($comment);
            $manager->flush();
        }

        return $this->render('trick/index.html.twig', [
            'title' => $trick->getName(),
            'name' => $trick->getName(),
            'image' => $trick->getImage(),
            'description' => $trick->getDescription(),
            'createdate' => $trick->getCreatedAt(),
            'updatedate' => $trick->getUpdatedAt(),
            'form' => $form->createView()
        ]);
    }
}