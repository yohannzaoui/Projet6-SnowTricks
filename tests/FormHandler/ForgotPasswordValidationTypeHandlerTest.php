<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:21
 */

namespace App\Tests\FormHandler;


use App\FormHandler\ForgotPasswordValidationTypeHandler;
use App\FormHandler\Interfaces\ForgotPasswordValidationTypeHandlerInterface;
use App\Repository\UserRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class ForgotPasswordValidationTypeHandlerTest
 * @package App\Tests\FormHandler
 */
class ForgotPasswordValidationTypeHandlerTest extends TestCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;
    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     *
     */
    public function setUp()
    {
        $this->userRepository = $this->createMock(
            UserRepository::class
        );
        $this->messageFlash = $this->createMock(
            SessionInterface::class
        );
        $this->encoderFactory = $this->createMock(
            EncoderFactoryInterface::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $forgotPasswordValidationTypeHandler = new ForgotPasswordValidationTypeHandler(
            $this->userRepository,
            $this->encoderFactory,
            $this->messageFlash
        );

        static::assertInstanceOf(
            ForgotPasswordValidationTypeHandlerInterface::class,
            $forgotPasswordValidationTypeHandler
        );
    }
}