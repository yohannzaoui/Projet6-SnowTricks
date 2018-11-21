<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 10:32
 */

namespace App\Tests\Entity;


use App\Entity\Video;
use PHPUnit\Framework\TestCase;

/**
 * Class VideoTest
 * @package App\Tests\Entity
 */
class VideoTest extends TestCase
{
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
}