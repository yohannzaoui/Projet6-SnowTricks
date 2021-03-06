<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 20:54
 */

namespace App\Tests\FormHandler;


use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;
use App\FormHandler\CommentHandler;
use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\CommentRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class CommentHandlerTest
 * @package App\Tests\FormHandler
 */
class CommentHandlerTest extends TestCase
{


    /**
     * @var
     */
    private $commentRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     *
     */
    public function setUp()
    {
        $this->commentRepository = $this->createMock(CommentRepository::class);
        $this->messageFlash = $this->createMock(SessionInterface::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $commentHandler = new CommentHandler(
          $this->commentRepository,
          $this->messageFlash
        );

        static::assertInstanceOf(CommentHandlerInterface::class, $commentHandler);
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function testHandlerIfIsTrue()
    {
        $comment = $this->createMock(Comment::class);
        $form = $this->createMock(FormInterface::class);
        $user = $this->createMock(User::class);
        $trick = $this->createMock(Trick::class);

        $commentHandler = new CommentHandler(
            $this->commentRepository,
            $this->messageFlash
        );

        static::assertTrue(true, $commentHandler->handle(
            $form, $user, $trick, $comment
        ));
    }

    /**
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function testHandlerIfIsFalse()
    {
        $comment = $this->createMock(Comment::class);
        $form = $this->createMock(FormInterface::class);
        $user = $this->createMock(User::class);
        $trick = $this->createMock(Trick::class);

        $commentHandler = new CommentHandler(
            $this->commentRepository,
            $this->messageFlash
        );

        static::assertFalse(false, $commentHandler->handle(
            $form, $user, $trick, $comment
        ));
    }
}