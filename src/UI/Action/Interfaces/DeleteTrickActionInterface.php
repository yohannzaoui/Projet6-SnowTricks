<?php

namespace App\UI\Action\Interfaces;

use App\UI\Responder\DeleteTrickResponder;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DeleteTrickActionInterface
 * @package App\UI\Action\Interfaces
 */
interface DeleteTrickActionInterface
{

    /**
     *
     * @param Request $request
     * @param DeleteTrickResponder $responder
     * @return mixed
     */
    public function __invoke(Request $request, DeleteTrickResponder $responder);
    
}