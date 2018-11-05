<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 09:17
 */

namespace App\Tests\Domain\Models;


use App\Domain\Models\Comment;
use App\Domain\Models\Trick;
use PHPUnit\Framework\TestCase;

/**
 * Class CommentTest
 * @package App\Tests\Domain\Models
 */
class CommentTest extends TestCase
{
    /**
     * @var
     */
    private $trick;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        $this->trick = $this->createMock(Trick::class);
    }

    /**
     * @throws \Exception
     */
    public function testGetMessage()
    {
        $comment = new Comment('yohann', 'message',$this->trick);
        $result = $comment->getMessage();
        $this->assertSame('message', $result);
    }

    /**
     * @throws \Exception
     */
    public function testGetPseudo()
    {
        $comment = new Comment('yohann', 'message', $this->trick);
        $result = $comment->getPseudo();
        $this->assertSame('yohann', $result);
    }
}