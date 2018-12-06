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
use App\Services\Interfaces\EncoderInterface;
use Symfony\Component\Form\FormInterface;

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
     * @var EncoderInterface
     */
    private $encoder;
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
        $this->encoder = $this->createMock(
            EncoderInterface::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $forgotPasswordValidationTypeHandler = new ForgotPasswordValidationTypeHandler(
            $this->userRepository,
            $this->encoder,
            $this->messageFlash
        );

        static::assertInstanceOf(
            ForgotPasswordValidationTypeHandlerInterface::class,
            $forgotPasswordValidationTypeHandler
        );
    }

    /**
     *
     */
    public function testHandlerIsTrue()
    {
        $form = $this->createMock(FormInterface::class);
        $token = 'token';

        $forgotPasswordValidationTypeHandler = new ForgotPasswordValidationTypeHandler(
            $this->userRepository,
            $this->encoder,
            $this->messageFlash
        );

        static::assertTrue(true, $forgotPasswordValidationTypeHandler->handle(
            $token, $form
        ));
    }

    /**
     *
     */
    public function testHandlerIsFalse()
    {
        $form = $this->createMock(FormInterface::class);
        $token = 'token';

        $forgotPasswordValidationTypeHandler = new ForgotPasswordValidationTypeHandler(
            $this->userRepository,
            $this->encoder,
            $this->messageFlash
        );

        static::assertFalse(false, $forgotPasswordValidationTypeHandler->handle(
            $token, $form
        ));
    }
}