<?php

namespace App\UI\Action;

use App\Domain\Repository\TrickRepository;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\HomeActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Class HomeAction
 * @package App\UI\Action
 */
class HomeAction implements HomeActionInterface
{

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * HomeAction constructor.
     * @param TrickRepository $trickRepository
     */
    public function __construct(TrickRepository $trickRepository)
    {
        $this->trickRepository = $trickRepository;
    }


    /**
     * @Route("/", name="home", methods={"GET"})
     * @param HomeResponderInterface $responder
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $responder)
    {

        $tricks = $this->trickRepository->getAllTricks();
        return $responder($tricks);
    }
}