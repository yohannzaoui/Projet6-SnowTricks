<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:37
 */

namespace App\Tests\FormHandler;


use App\FormHandler\Interfaces\RegisterFormHandlerInterface;
use App\FormHandler\RegisterFormHandler;
use App\Repository\UserRepository;
use App\Services\Interfaces\EmailerInterface;
use App\Services\Interfaces\FileUploaderInterface;
use App\Services\Interfaces\TokenInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class RegisterFormHandlerTest
 * @package App\Tests\FormHandler
 */
class RegisterFormHandlerTest extends TestCase
{
    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

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
        $this->fileUploader = $this->createMock(
          FileUploaderInterface::class
        );
        $this->encoder = $this->createMock(
          EncoderFactoryInterface::class
        );
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
        $registerFormHandler = new RegisterFormHandler(
            $this->fileUploader,
            $this->encoder,
            $this->userRepository,
            $this->emailer,
            $this->messageFlash,
            $this->eventDispatcher,
            $this->tokenService
        );

        static::assertInstanceOf(
            RegisterFormHandlerInterface::class,
            $registerFormHandler
            );
    }
}