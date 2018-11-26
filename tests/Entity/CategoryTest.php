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
    /**
     * @throws \Exception
     */
    public function testGetName()
    {
        $category = new Category();
        $category->setName('name');
        $result = $category->getName();
        $this->assertSame('name', $result);
    }
}