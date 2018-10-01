<?php

namespace App\Controller;

use App\Entity\Trick;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Trick::class);
        $tricks = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'title' => 'Bienvenue !',
            'tricks' => $tricks
            ]);
    }
}