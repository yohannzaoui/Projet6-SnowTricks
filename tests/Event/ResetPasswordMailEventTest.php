<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 22:05
 */

namespace App\Tests\Event;


use App\Event\Interfaces\MailEventInterface;
use App\Event\ResetPasswordMailEvent;
use App\Services\Interfaces\EmailerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class ResetPasswordMailEventTest
 * @package App\Tests\Event
 */
class ResetPasswordMailEventTest extends TestCase
{
    /**
     *
     */
    const NAME = 'resetPasswordMail.event';

    /**
     * @var
     */
    private $email;

    /**
     * @var
     */
    private $token;


    public function setUp()
    {
        $this->email = 'mail@email.com';
        $this->token = 'azertyu12345';
    }

    /**
     *
     */
    public function testConstruct()
    {
        $resetPasswordMailEvent = new ResetPasswordMailEvent(
            $this->email,
            $this->token
        );

        static::assertInstanceOf(
          MailEventInterface::class,
          $resetPasswordMailEvent
        );
    }

    /**
     *
     */
    public function testIfSendMailReturnArray()
    {
        $registerMailEvent = new ResetPasswordMailEvent(
            $this->email,
            $this->token
        );

        $data = [
            'email' => $this->email,
            'token' => $this->token
        ];

        $this->assertSame($data, $registerMailEvent->sendEmail());
    }
}