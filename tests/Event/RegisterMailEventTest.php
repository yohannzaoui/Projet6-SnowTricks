<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:57
 */

namespace App\Tests\Event;


use App\Event\Interfaces\RegisterMailEventInterface;
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
     * @var EmailerInterface
     */
    private $emailer;

    /**
     *
     */
    public function setUp()
    {
        $this->email = 'mail@mail.com';
        $this->token = 'azerty12345';
        $this->emailer = $this->createMock(EmailerInterface::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $registerMailEvent = new RegisterMailEvent(
            $this->emailer,
            $this->email,
            $this->token
        );

        static::assertInstanceOf(
          RegisterMailEventInterface::class,
          $registerMailEvent
        );
    }
}