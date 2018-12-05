<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 09:50
 */

namespace App\Tests\Controller;


use App\Controller\DeleteUserController;
use App\Controller\Interfaces\DeleteUserControllerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Repository\UserRepository;
use App\Services\FileRemover;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DeleteUserControllerTest extends KernelTestCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FileRemover
     */
    private $fileRemover;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     *
     */
    public function setUp()
    {
        static::bootKernel();

        $this->tokenStorage = static::$kernel->getContainer()->get('security.token_storage');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
        $this->messageFlash = static::$kernel->getContainer()->get('session');
        $this->eventDispatcher = $this->createMock(EventDispatcherInterface::class);

    }

    /**
     *
     */
    public function testConstruct()
    {
        $this->fileRemover = $this->createMock(FileRemover::class);
        $this->userRepository = $this->createMock(UserRepository::class);

        $deleteUserController = new DeleteUserController(
            $this->userRepository,
            $this->fileRemover,
            $this->tokenStorage,
            $this->urlGenerator,
            $this->messageFlash,
            $this->eventDispatcher
        );

        static::assertInstanceOf(DeleteUserControllerInterface::class, $deleteUserController);
    }

}