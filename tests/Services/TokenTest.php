<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 22:49
 */

namespace App\Tests\Services;


use App\Services\Token;
use PHPUnit\Framework\TestCase;

/**
 * Class TokenTest
 * @package App\Tests\Services
 */
class TokenTest extends TestCase
{
    /**
     *
     */
    public function testTokenService()
    {
        $token = new Token();

        static::assertNotNull($token::generateToken());
    }
}