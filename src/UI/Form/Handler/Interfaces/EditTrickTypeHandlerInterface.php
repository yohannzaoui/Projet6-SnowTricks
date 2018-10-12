<?php

namespace App\UI\Form\Handler\Interfaces;

use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Interface EditTrickTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface EditTrickTypeHandlerInterface
{
    /**
     * EditTrickTypeHandlerInterface constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager);

    /**
     * @param FormInterface $form
     * @param $trick
     * @return mixed
     */
    public function handle(FormInterface $form, $trick);
}