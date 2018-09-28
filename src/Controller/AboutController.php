<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AboutController extends AbstractController
{
    /**
     * @Route("/Apropos", name="about")
     */
    public function index()
    {
        return $this->render('about/index.html.twig');
    }
}