<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/11/2018
 * Time: 22:23
 */

namespace App\FormHandler\Interfaces;

use App\Repository\CommentRepository;
use App\Repository\Interfaces\CommentRepositoryInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;
use App\Entity\Comment;


/**
 * Interfaces CommentHandlerInterface
 * @package App\FormHandler\Interfaces
 */
interface CommentHandlerInterface
{
    /**
     * CommentHandlerInterface constructor.
     * @param CommentRepositoryInterface $commentRepository
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        CommentRepositoryInterface $commentRepository,
        SessionInterface $messageFlash
    );

    /**
     * @param FormInterface $form
     * @param $user
     * @param $trick
     * @param Comment $comment
     * @return mixed
     */
    public function handle(FormInterface $form, $user, $trick, Comment $comment);
}