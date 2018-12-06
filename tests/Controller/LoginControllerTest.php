<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 22:40
 */

namespace App\Tests\Controller;


use App\Controller\Interfaces\LoginControllerInterface;
use App\Controller\LoginController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

/**
 * Class LoginControllerTest
 * @package App\Tests\Controller
 */
class LoginControllerTest extends KernelTestCase
{
    /**
     * @var
     */
    private $twig;

    /**
     *
     */
    public function setUp()
    {
        $this->twig = $this->createMock(
            Environment::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $loginController = new LoginController(
          $this->twig
        );

        static::assertInstanceOf(
            LoginControllerInterface::class,
            $loginController
        );
    }
}