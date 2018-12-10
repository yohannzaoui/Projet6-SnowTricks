<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 10:00
 */

namespace App\Tests\Entity;

use App\Entity\Interfaces\TrickInterface;
use PHPUnit\Framework\TestCase;
use App\Entity\Trick;

class TrickTest extends TestCase
{
    private $trick;


    /**
     *
     */
    public function testInterface()
    {
        $trick = $this->createMock(Trick::class);

        $this->assertInstanceOf(TrickInterface::class, $trick);
    }

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        $this->trick = new Trick();
    }

    /**
     * @throws \Exception
     */
    public function testGetName()
    {
        $this->trick->setName('test');
        $result = $this->trick->getName();
        $this->assertSame('test', $result);

    }

    /**
     * @throws \Exception
     */
    public function testGetNameIfIsNull()
    {
        $this->trick->setName(null);
        $this->assertNull($this->trick->getName());
    }

    /**
     * @throws \Exception
     */
    public function testGetDescription()
    {
        $this->trick->setDescription('test');
        $result = $this->trick->getDescription();
        $this->assertSame('test', $result);
    }

    /**
     * @throws \Exception
     */
    public function testGetDescriptionIfIsNull()
    {
        $this->trick->setDescription(null);
        $this->assertNull($this->trick->getDescription());
    }

    /**
     *
     */
    public function testGetSlug()
    {
        $this->trick->setSlug('test-trick');
        $result = $this->trick->getSlug();
        $this->assertSame('test-trick', $result);
    }

    /**
     *
     */
    public function testGetSlugIfIsNull()
    {
        $this->trick->setSlug(null);
        $this->assertNull($this->trick->getSlug());
    }
}
