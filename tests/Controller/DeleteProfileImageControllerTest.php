<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 21:00
 */

namespace App\Tests\Controller;


use App\Controller\DeleteProfileImageController;
use App\Controller\Interfaces\DeleteProfileImageControllerInterface;
use App\Repository\UserRepository;
use App\Services\FileRemover;
use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * Class DeleteProfileImageControllerTest
 * @package App\Tests\Controller
 */
class DeleteProfileImageControllerTest extends KernelTestCase
{
    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FileRemoverInterface
     */
    private $fileRemover;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function setUp()
    {
        static::bootKernel();

        $this->tokenStorage = static::$kernel->getContainer()->get('security.token_storage');
        $this->messageFlash = static::$kernel->getContainer()->get('session');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
    }

    public function testConstruct()
    {
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->fileRemover = $this->createMock(FileRemover::class);

        $deleteProfileImageController = new DeleteProfileImageController(
            $this->tokenStorage,
            $this->messageFlash,
            $this->userRepository,
            $this->fileRemover,
            $this->urlGenerator
        );

        static::assertInstanceOf(DeleteProfileImageControllerInterface::class, $deleteProfileImageController);
    }

}