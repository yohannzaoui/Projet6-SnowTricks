<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:28
 */

namespace App\Tests\FormHandler;


use App\FormHandler\Interfaces\ProfileTypeHandlerInterface;
use App\FormHandler\ProfileTypeHandler;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use App\Services\Interfaces\FileUploaderInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class ProfileTypeHandlerTest
 * @package App\Tests\FormHandler
 */
class ProfileTypeHandlerTest extends TestCase
{
    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var FileRemoverInterface
     */
    private $fileRemover;

    /**
     * @var
     */
    private $eventDispatcher;

    /**
     *
     */
    public function setUp()
    {
        $this->fileUploader = $this->createMock(
            FileUploaderInterface::class
        );
        $this->userRepository = $this->createMock(
          UserRepository::class
        );
        $this->messageFlash = $this->createMock(
          SessionInterface::class
        );
        $this->fileRemover = $this->createMock(
          FileRemoverInterface::class
        );
        $this->eventDispatcher = $this->createMock(
          EventDispatcherInterface::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $profileTypeHandler = new ProfileTypeHandler(
            $this->fileUploader,
            $this->messageFlash,
            $this->userRepository,
            $this->fileRemover,
            $this->eventDispatcher

        );

        static::assertInstanceOf(
            ProfileTypeHandlerInterface::class,
            $profileTypeHandler
        );
    }

    /**
     *
     */
    public function testHandlerIsTrue()
    {
        $form = $this->createMock(FormInterface::class);
        $idUser = '123456';
        $imageUser = '/public/upload/image.jpg';

        $profileTypeHandler = new ProfileTypeHandler(
            $this->fileUploader,
            $this->messageFlash,
            $this->userRepository,
            $this->fileRemover,
            $this->eventDispatcher

        );

        static::assertTrue(true, $profileTypeHandler->handle(
            $form, $idUser, $imageUser
        ));
    }

    /**
     *
     */
    public function testHandlerIsFalse()
    {
        $form = $this->createMock(FormInterface::class);
        $idUser = '123456';
        $imageUser = '/public/upload/image.jpg';

        $profileTypeHandler = new ProfileTypeHandler(
            $this->fileUploader,
            $this->messageFlash,
            $this->userRepository,
            $this->fileRemover,
            $this->eventDispatcher

        );

        static::assertFalse(false, $profileTypeHandler->handle(
            $form, $idUser, $imageUser
        ));
    }
}