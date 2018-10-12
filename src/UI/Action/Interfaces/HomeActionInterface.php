<?php

namespace App\UI\Action\Interfaces;

use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Interface HomeActionInterface
 * @package App\UI\Action\Interfaces
 */
interface HomeActionInterface
{
    /**
     * @param HomeResponderInterface $responder
     * @param ObjectManager $manager
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $responder, ObjectManager $manager);
}