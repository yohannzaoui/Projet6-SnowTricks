<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:12
 */

namespace App\Tests\FormHandler;


use App\FormHandler\ForgotPasswordHandler;
use App\FormHandler\Interfaces\ForgotPasswordHandlerInterface;
use App\Repository\UserRepository;
use App\Services\Interfaces\EmailerInterface;
use App\Services\Interfaces\TokenInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ForgotPasswordHandlerTest
 * @package App\Tests\FormHandler
 */
class ForgotPasswordHandlerTest extends TestCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EmailerInterface
     */
    private $emailer;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var
     */
    private $tokenService;

    /**
     *
     */
    public function setUp()
    {
        $this->userRepository = $this->createMock(
            UserRepository::class
        );
        $this->emailer = $this->createMock(
            EmailerInterface::class
        );
        $this->messageFlash = $this->createMock(
            SessionInterface::class
        );
        $this->eventDispatcher = $this->createMock(
            EventDispatcherInterface::class
        );
        $this->tokenService = $this->createMock(
          TokenInterface::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $forgotPasswordHandler = new ForgotPasswordHandler(
            $this->userRepository,
            $this->emailer,
            $this->messageFlash,
            $this->eventDispatcher,
            $this->tokenService
        );

        static::assertInstanceOf(
            ForgotPasswordHandlerInterface::class,
            $forgotPasswordHandler
        );
    }
}