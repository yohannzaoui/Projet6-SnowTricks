<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\DeleteTrickActionInterface;

/**
 * 
 */
class DeleteTrickAction implements DeleteTrickActionInterface
{
    /**
     * 
     * @Route("/supprimerTrick/{id}", name="deltrick", methods={"GET"})
     */
    public function __invoke(ObjectManager $manager, Request $request, DeleteTrickResponder $responder)
    {

        $trick = $manager->getRepository(Trick::class)->find($request->get('id'));
        $manager->remove($trick);
        $manager->flush();
        return $responder();
    }
}