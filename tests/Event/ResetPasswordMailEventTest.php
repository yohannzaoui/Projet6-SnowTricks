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

    /**
     * @var EmailerInterface
     */
    private $emailer;


    public function setUp()
    {
        $this->email = 'mail@email.com';
        $this->token = 'azertyu12345';
        $this->emailer = $this->createMock(
          EmailerInterface::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $resetPasswordMailEvent = new ResetPasswordMailEvent(
            $this->emailer,
            $this->email,
            $this->token
        );

        static::assertInstanceOf(
          MailEventInterface::class,
          $resetPasswordMailEvent
        );
    }
}