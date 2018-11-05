<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 10:21
 */

namespace App\Tests\Domain\Models;


use App\Domain\Models\Category;
use PHPUnit\Framework\TestCase;

/**
 * Class CategoryTest
 * @package App\Tests\Domain\Models
 */
class CategoryTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testGetNameCategory()
    {
        $nameCategory = new Category('category');
        $result = $nameCategory->getName();
        $this->assertSame('category', $result);
    }
}