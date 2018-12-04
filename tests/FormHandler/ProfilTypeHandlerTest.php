<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 21:28
 */

namespace App\Tests\FormHandler;


use App\FormHandler\Interfaces\ProfilTypeHandlerInterface;
use App\FormHandler\ProfilTypeHandler;
use App\Repository\UserRepository;
use App\Services\Interfaces\FileRemoverInterface;
use App\Services\Interfaces\FileUploaderInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class ProfilTypeHandlerTest
 * @package App\Tests\FormHandler
 */
class ProfilTypeHandlerTest extends TestCase
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
    }

    /**
     *
     */
    public function testConstruct()
    {
        $profilTypeHandler = new ProfilTypeHandler(
            $this->fileUploader,
            $this->messageFlash,
            $this->userRepository,
            $this->fileRemover
        );

        static::assertInstanceOf(
            ProfilTypeHandlerInterface::class,
            $profilTypeHandler
        );
    }
}