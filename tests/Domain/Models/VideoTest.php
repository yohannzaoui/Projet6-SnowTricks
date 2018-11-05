<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 10:38
 */

namespace App\Tests\Domain\Models;


use App\Domain\Models\Video;
use PHPUnit\Framework\TestCase;

/**
 * Class TestVideo
 * @package App\Tests\Domain\Models
 */
class VideoTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetUrl()
    {
        $video = new Video('url');
        $result = $video->getUrl();
        $this->assertSame('url', $result);
    }
}