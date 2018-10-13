<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\TrickBuilder;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Interface AddTrickTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface AddTrickTypeHandlerInterface
{
    /**
     * AddTrickTypeHandlerInterface constructor.
     * @param ObjectManager $manager
     */
    public function __construct(ObjectManager $manager, TrickBuilder $trickBuilder);

    /**
     * @param FormInterface $form
     * @param $trick
     * @return mixed
     */
    public function handle(FormInterface $form);
}