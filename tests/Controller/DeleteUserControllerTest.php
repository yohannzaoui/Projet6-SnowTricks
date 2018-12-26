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
use App\Services\Interfaces\FileRemoverInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Repository\UserRepository;
use App\Services\FileRemover;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class DeleteUserControllerTest
 * @package App\Tests\Controller
 */
class DeleteUserControllerTest extends KernelTestCase
{

    /**
     *
     */
    public function testConstruct()
    {
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $userRepository = $this->createMock(UserRepository::class);
        $eventDispatcher = $this->createMock(EventDispatcherInterface::class);
        $messageFlash = $this->createMock(SessionInterface::class);

        $deleteUserController = new DeleteUserController(
            $userRepository,
            $tokenStorage,
            $urlGenerator,
            $messageFlash,
            $eventDispatcher
        );

        static::assertInstanceOf(DeleteUserControllerInterface::class, $deleteUserController);
    }

}