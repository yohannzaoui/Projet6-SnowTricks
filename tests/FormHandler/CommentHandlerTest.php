<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 20:54
 */

namespace App\Tests\FormHandler;


use App\FormHandler\CommentHandler;
use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\CommentRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

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
}