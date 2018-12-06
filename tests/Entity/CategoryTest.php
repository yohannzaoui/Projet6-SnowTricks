<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/11/2018
 * Time: 10:25
 */

namespace App\Tests\Entity;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

/**
 * Class CategoryTest
 * @package App\Tests\Entity
 */
class CategoryTest extends TestCase
{
    private $category;

    /**
     * @throws \Exception
     */
    public function setUp()
    {
        $this->category = new Category();
    }

    /**
     * @throws \Exception
     */
    public function testGetNameIfIsString()
    {
        $this->category->setName('name');
        $result = $this->category->getName();
        $this->assertSame('name', $result);
    }

    /**
     * @throws \Exception
     */
    public function testGetNameIfIsNull()
    {
        $this->category->setName(null);
        $this->assertNull($this->category->getName());
    }
}