<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Doctrine\Common\Persistence\ObjectManager;

class HomeAction implements HomeActionInterface
{

    /**
     * @Route("/", name="home", methods={"GET"})
     */
    public function __invoke(HomeResponderInterface $responder,
        ObjectManager $manager
    ) {
        
        $tricks = $manager->getRepository(Trick::class)->findAll();
        //$tricks = "test";
        return $responder($tricks);
    }
}