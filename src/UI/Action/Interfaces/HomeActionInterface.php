<?php

namespace App\UI\Action\Interfaces;

use App\Domain\Repository\TrickRepository;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Interface HomeActionInterface
 * @package App\UI\Action\Interfaces
 */
interface HomeActionInterface
{
    /**
     * HomeActionInterface constructor.
     * @param TrickRepository $trickRepository
     */
    public function __construct(TrickRepository $trickRepository);


    /**
     * @param HomeResponderInterface $responder
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $responder);
}