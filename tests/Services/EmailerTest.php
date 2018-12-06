<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 21:34
 */

namespace App\Tests\Services;

use App\Services\Emailer;
use App\Services\Interfaces\EmailerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EmailerTest extends KernelTestCase
{

    private $swiftMailer;

    public function setUp()
    {
        $this->swiftMailer = $this->createMock(\Swift_Mailer::class);
    }

    public function test__construct()
    {
        $emailer = new Emailer(
            $this->swiftMailer
        );

        static::assertInstanceOf(
            EmailerInterface::class,
            $emailer
        );
    }
}
