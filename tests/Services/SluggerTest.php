<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 13:06
 */

namespace App\Tests\Services;


use App\Services\Slugger;
use PHPUnit\Framework\TestCase;

/**
 * Class SluggerTest
 * @package App\Tests\Services
 */
class SluggerTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testSlugger()
    {
        $slugger = new Slugger();

        $result = $slugger->createSlug('test slug');

        $this->assertSame('test-slug', $result);

    }
}