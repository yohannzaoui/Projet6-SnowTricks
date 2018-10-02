<?php

namespace App\Controller;

use App\Entity\Trick;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TrickController extends AbstractController
{
    /**
     * @Route("/tricks/details/{id}", name="trick")
     */
    public function index(ObjectManager $manager, $id)
    {
        $Manager = $this->getDoctrine()->getManager();
        $trick = $Manager->getRepository(Trick::class)->find($id);

        return $this->render('trick/index.html.twig', [
            'title' => 'Tricks',
            'name' => $trick->getName(),
            'image' => $trick->getImage(),
            'description' => $trick->getDescription(),
            'createdate' => $trick->getCreatedAt(),
            'updatedate' => $trick->getUpdatedAt()
        ]);
    }
}