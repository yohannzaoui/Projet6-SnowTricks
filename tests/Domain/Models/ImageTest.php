<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 10:36
 */

namespace App\Tests\Domain\Models;


use App\Domain\Models\Image;
use PHPUnit\Framework\TestCase;

/**
 * Class ImageTest
 * @package App\Tests\Domain\Models
 */
class ImageTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetImage()
    {
        $image = new Image('fileName');
        $result = $image->getImage();
        $this->assertSame('fileName', $result);

    }
}