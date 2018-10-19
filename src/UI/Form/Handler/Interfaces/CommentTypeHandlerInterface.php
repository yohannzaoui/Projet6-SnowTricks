<?php

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Builder\Interfaces\CommentBuilderInterface;
use Symfony\Component\Form\FormInterface;
use App\Domain\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface CommentTypeHandlerInterface
 * @package App\UI\Form\Handler\Interfaces
 */
interface CommentTypeHandlerInterface
{

    /**
     * CommentTypeHandlerInterface constructor.
     * @param CommentRepository $commentRepository
     * @param CommentBuilderInterface $commentBuilder
     */
    public function __construct(
        CommentRepository $commentRepository,
        CommentBuilderInterface $commentBuilder,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @param $trick
     * @return bool
     */
    public function handle(FormInterface $form, $trick): bool;
}