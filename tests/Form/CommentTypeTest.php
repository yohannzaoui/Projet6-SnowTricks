<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 11:50
 */

namespace App\Tests\Form;


use App\Entity\Comment;
use App\Entity\Trick;
use App\Entity\User;
use App\Form\CommentType;
use App\Form\Interfaces\TypeInterface;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class CommentTypeTest
 * @package App\Tests\Form
 */
class CommentTypeTest extends TypeTestCase
{

    /**
     *
     */
    public function testInterface()
    {
        $addTrickType = $this->createMock(CommentType::class);

        $this->assertInstanceOf(TypeInterface::class, $addTrickType);
    }


    /**
     *
     */
    public function testForm()
    {

        $uuid = $this->createMock(UuidInterface::class);
        $user = $this->createMock(User::class);
        $date = $this->createMock(\DateTime::class);
        $trick = $this->createMock(Trick::class);

        $formData = [
            'id' => $uuid,
            'author' => $user,
            'message' => 'message',
            'createdAt' => $date,
            'trick' => $trick

        ];

        $commentToCompare = $this->createMock(Comment::class);

        $form = $this->factory->create(CommentType::class, $commentToCompare);

        $comment = $this->createMock(Comment::class);
        $comment->setId($uuid);
        $comment->setAuthor($user);
        $comment->setMessage('message');
        $comment->setCreatedAt($date);
        $comment->setTrick($trick);


        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($comment, $commentToCompare);

        $this->assertInstanceOf(Comment::class, $form->getData());
    }
}