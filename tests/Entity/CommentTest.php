<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 23/11/2018
 * Time: 09:37
 */

namespace App\Tests\Entity;


use App\Entity\Comment;
use App\Entity\Trick;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CommentTest
 * @package App\Tests\Entity
 */
class CommentTest extends KernelTestCase
{
    /**
     * @throws \Exception
     */
    public function testGetMessageIfIsString()
    {
        $comment = new Comment();
        $comment->setMessage('message test');
        $result = $comment->getMessage();
        $this->assertSame('message test', $result);
    }

    /**
     * @throws \Exception
     */
    public function testGetMessageIfIsNull()
    {
        $comment = new Comment();
        $comment->setMessage(null);
        $this->assertNull($comment->getMessage());
    }


}