<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/12/2018
 * Time: 09:23
 */

namespace App\Tests\Form;


use App\Entity\Trick;
use App\Form\AddTrickType;
use Symfony\Component\Form\Test\TypeTestCase;
use Ramsey\Uuid\UuidInterface;

class AddTrickTypeTest extends TypeTestCase
{
    public function testForm()
    {
        $uuid = $this->createMock(UuidInterface::class);

        $formData = [
            'id' => $uuid,
            'name' => 'test',
            'description' => 'description',
            'defaultImage' => 'defaultImage',
            'images' => [
                'image1' => 'image1',
                'image2' => 'image2'
            ],
            'videos' => [
                'video1' => 'video1',
                'video2' => 'video2'
            ],
            'category' => 'catTest'
        ];

        $trickToCompare = $this->createMock(Trick::class);

        $form = $this->factory->create(AddTrickType::class, $trickToCompare);

        $trick = $this->createMock(Trick::class);
        $trick->setId($uuid);
        $trick->setName('trick');
        $trick->setDescription('description');
        $trick->setDefaultImage('defaultImage');
        $trick->addImage('image');
        $trick->addVideo('video');
        $trick->setCategory('catTest');

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($trick, $trickToCompare);

        $this->assertInstanceOf(Trick::class, $form->getData());
    }
}