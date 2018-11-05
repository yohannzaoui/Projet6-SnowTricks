<?php

namespace App\UI\Action\Interfaces;

use App\Domain\Repository\TrickRepository;
use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DeleteTrickActionInterface
 * @package App\UI\Action\Interfaces
 */
interface DeleteTrickActionInterface
{

    /**
     * DeleteTrickActionInterface constructor.
     * @param TrickRepository $trickRepository
     */
    public function __construct(
        TrickRepository $trickRepository
    );

    /**
     *
     * @param Request $request
     * @param DeleteTrickResponder $responder
     * @return mixed
     */
    public function __invoke(
        Request $request,
        DeleteTrickResponder $responder
    );
    
}