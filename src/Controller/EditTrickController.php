<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class EditTrickController extends AbstractController
{
    /**
     * @Route("/ajouterTrick", name="addtrick")
     * @Route("/modifierTrick", name="updatetrick")
     * @Route("supprimerTrick", name="deltrick")
     */
    public function index()
    {
        return $this->render('edit/index.html.twig', [
            'title' => 'Ajouter / modifier un Trick'
        ]);
    }
}