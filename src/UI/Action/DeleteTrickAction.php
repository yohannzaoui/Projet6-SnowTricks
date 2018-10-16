<?php

namespace App\UI\Action;

use App\Domain\Models\Trick;
use App\Domain\Repository\TrickRepository;
use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\DeleteTrickActionInterface;


/**
 * Class DeleteTrickAction
 * @package App\UI\Action
 */
class DeleteTrickAction implements DeleteTrickActionInterface
{
    private $trickRepository;

    public function __construct(TrickRepository $trickRepository)
    {
        $this->trickRepository = $trickRepository;
    }

    /**
     * 
     * @Route("/supprimerTrick/{id}", name="deltrick", methods={"GET"})
     */
    public function __invoke(ObjectManager $manager, Request $request, DeleteTrickResponder $responder)
    {

        $this->trickRepository->delete($request->get('id'));

        return $responder();
    }
}