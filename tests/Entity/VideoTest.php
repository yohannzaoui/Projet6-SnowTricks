<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 10:32
 */

namespace App\Tests\Entity;


use App\Entity\Interfaces\VideoInterface;
use App\Entity\Video;
use PHPUnit\Framework\TestCase;

/**
 * Class VideoTest
 * @package App\Tests\Entity
 */
class VideoTest extends TestCase
{

    /**
     *
     */
    public function testInterface()
    {
        $video = $this->createMock(Video::class);

        $this->assertInstanceOf(VideoInterface::class, $video);
    }

    /**
     * @throws \Exception
     */
    public function testGetUrl()
    {
        $video = new Video();
        $video->setUrl('video');
        $result = $video->getUrl();
        $this->assertSame('video', $result);
    }

    /**
     * @throws \Exception
     */
    public function testGetUrlIfIfNull()
    {
        $video = new Video();
        $video->setUrl(null);
        $this->assertNull($video->getUrl());
    }
}