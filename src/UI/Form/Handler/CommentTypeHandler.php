<?php

namespace App\UI\Form\Handler;

use App\Domain\Models\Comment;
use Symfony\Component\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use App\UI\Form\Handler\Interfaces\CommentTypeHandlerInterface;

/**
 * 
 */
class CommentTypeHandler implements CommentTypeHandlerInterface
{

    private $manager;

    /**
     * 
     */
    public function __construct(ObjectManager $manager)
    {
        $this->manager = $manager;
    }
    
    /**
     * 
     */
    public function handle(FormInterface $form, $trick): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $comment = new Comment;
            $data = $form->getData();
            $comment->setPseudo($data->pseudo)
                    ->setMessage($data->message)
                    ->setCreatedAt(new \DateTime)
                    ->setTrick($trick);
            $this->manager->persist($comment);
            $this->manager->flush();
            return true;
        }
        return false;
    }
}