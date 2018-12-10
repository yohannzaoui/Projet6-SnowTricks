<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:57
 */

namespace App\Tests\Event;


use App\Event\Interfaces\MailEventInterface;
use App\Event\RegisterMailEvent;
use App\Services\Interfaces\EmailerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class RegisterMailEventTest
 * @package App\Tests\Event
 */
class RegisterMailEventTest extends TestCase
{
    /**
     *
     */
    const NAME = "registerMail.event";

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $token;

    /**
     *
     */
    public function setUp()
    {
        $this->email = 'mail@mail.com';
        $this->token = 'azerty12345';
    }

    /**
     *
     */
    public function testConstruct()
    {
        $registerMailEvent = new RegisterMailEvent(
            $this->email,
            $this->token
        );

        static::assertInstanceOf(
          MailEventInterface::class,
          $registerMailEvent
        );
    }

    /**
     *
     */
    public function testIfSendMailReturnArray()
    {
        $registerMailEvent = new RegisterMailEvent(
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