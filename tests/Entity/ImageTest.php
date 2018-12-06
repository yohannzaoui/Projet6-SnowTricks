<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 10:28
 */

namespace App\Tests\Entity;


use App\Entity\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageTest
 * @package App\Tests\Entity
 */
class ImageTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testGetUrl()
    {
        $image = new Image();
        $image->setUrl('test.jpg');
        $result = $image->getUrl();
        $this->assertSame('test.jpg', $result);
    }

    /**
     * @throws \Exception
     */
    public function testGetUrlIfIsNUll()
    {
        $image = new Image();
        $image->setUrl(null);
        $this->assertNull($image->getUrl());
    }
}