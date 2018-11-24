<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/11/2018
 * Time: 22:20
 */

namespace App\FormHandler;

use App\Entity\Comment;
use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\CommentRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


/**
 * Class CommentHandler
 * @package App\FormHandler
 */
class CommentHandler implements CommentHandlerInterface
{
    /**
     * @var CommentRepository
     */
    private $commentRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * CommentHandler constructor.
     * @param CommentRepository $commentRepository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        CommentRepository $commentRepository,
        SessionInterface $messageFlash
    ) {
        $this->commentRepository = $commentRepository;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @param $user
     * @param $trick
     * @param Comment $comment
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function handle(FormInterface $form, $user, $trick, Comment $comment)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $comment->setAuthor($user);
            $comment->setMessage($form->getData()->getMessage());
            $comment->setTrick($trick);

            $this->commentRepository->save($comment);

            $this->messageFlash->getFlashBag()->add('comment', 'Commentaire ajouté :-)');
            return true;
        }
        return false;
    }

}