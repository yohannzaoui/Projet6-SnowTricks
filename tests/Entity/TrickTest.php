<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 10:00
 */

namespace App\Tests\Entity;

use PHPUnit\Framework\TestCase;
use App\Entity\Trick;

class TrickTest extends TestCase
{

    /**
     * @throws \Exception
     */
    public function testGetName()
    {
        $trick = new Trick();
        $trick->setName('test');
        $result = $trick->getName();
        $this->assertSame('test', $result);

    }

    /**
     * @throws \Exception
     */
    public function testGetDescription()
    {
        $trick = new Trick();
        $trick->setDescription('test');
        $result = $trick->getDescription();
        $this->assertSame('test', $result);
    }
}
