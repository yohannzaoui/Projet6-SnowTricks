<?php

namespace App\UI\Form\Handler\Interfaces;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormInterface;

/**
 * Interface ProfilTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface ProfilTypeHandlerInterface
{
    /**
     * ProfilTypeHandlerInterface constructor.
     */
    public function __construct(ObjectManager $manager);

    /**
     * @return mixed
     */
    public function handle(FormInterface $form);
}