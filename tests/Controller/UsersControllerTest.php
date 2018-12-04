<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 18:24
 */

namespace App\Tests\Controller;


use App\Controller\Interfaces\UsersControllerInterface;
use App\Controller\UsersController;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

class UsersControllerTest extends KernelTestCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var Environment
     */
    private $twig;

    /**
     *
     */
    public function setUp()
    {
        $this->userRepository = $this->createMock(UserRepository::class);
        $this->twig = $this->createMock(Environment::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $usersController = new UsersController(
          $this->userRepository,
          $this->twig
        );

        static::assertInstanceOf(UsersControllerInterface::class, $usersController);
    }
}