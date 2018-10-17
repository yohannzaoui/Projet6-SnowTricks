<?php

namespace App\UI\Form\Handler;

use App\Domain\Builder\Interfaces\CommentBuilderInterface;
use App\Domain\Repository\CommentRepository;
use Symfony\Component\Form\FormInterface;
use App\UI\Form\Handler\Interfaces\CommentTypeHandlerInterface;


/**
 * Class CommentTypeHandler
 * @package App\UI\Form\Handler
 */
class CommentTypeHandler implements CommentTypeHandlerInterface
{


    /**
     * @var CommentRepository
     */
    private $commentRepository;
    /**
     * @var CommentBuilderInterface
     */
    private $commentBuilder;


    /**
     * CommentTypeHandler constructor.
     * @param CommentRepository $commentRepository
     * @param CommentBuilderInterface $commentBuilder
     */
    public function __construct(CommentRepository $commentRepository, CommentBuilderInterface $commentBuilder)
    {
        $this->commentRepository = $commentRepository;
        $this->commentBuilder = $commentBuilder;
    }


    /**
     * @param FormInterface $form
     * @param $trick
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(FormInterface $form, $trick): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $this->commentBuilder->createFromComment($form->getData()->pseudo, $form->getData()->message, $trick);

            $this->commentRepository->save($this->commentBuilder->getComment());

            return true;
        }
        return false;
    }
}