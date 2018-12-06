<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 21:14
 */

namespace App\Tests\Form;

use App\Entity\Video;
use App\Form\VideoTrickType;
use Ramsey\Uuid\UuidInterface;
use App\Entity\Trick;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class VideoTrickTypeTest
 * @package App\Tests\Form
 */
class VideoTrickTypeTest extends TypeTestCase
{
    /**
     *
     */
    public function testForm()
    {

        $uuid = $this->createMock(UuidInterface::class);
        $trick = $this->createMock(Trick::class);

        $formData = [
            'url' => 'url test'
        ];

        $videoToCompare = $this->createMock(Video::class);

        $form = $this->factory->create(VideoTrickType::class, $videoToCompare);

        $video = $this->createMock(Video::class);
        $video->setId($uuid);
        $video->setUrl('url test');
        $video->setTrick($trick);

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($video, $videoToCompare);

        $this->assertInstanceOf(Video::class, $form->getData());

    }
}