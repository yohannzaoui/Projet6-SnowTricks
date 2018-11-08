<?php

namespace App\UI\Action;

use App\Domain\Repository\TrickRepository;
use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\DeleteTrickActionInterface;


/**
 * Class DeleteTrickAction
 * @package App\UI\Action
 */
class DeleteTrickAction implements DeleteTrickActionInterface
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;


    /**
     * DeleteTrickAction constructor.
     * @param TrickRepository $trickRepository
     */
    public function __construct(
        TrickRepository $trickRepository
    ) {
        $this->trickRepository = $trickRepository;
    }


    /**
     * @Route("/supprimerTrick/{id}", name="deltrick", methods={"GET"})
     * @param Request $request
     * @param DeleteTrickResponder $responder
     * @return mixed|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function __invoke(
        Request $request,
        DeleteTrickResponder $responder
    ) {
        if($request->attributes->get('id')){

            $this->trickRepository->delete($request->attributes->get('id'));


            return $responder();
        }
    }
}