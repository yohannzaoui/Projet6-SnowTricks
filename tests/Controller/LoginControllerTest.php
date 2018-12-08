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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
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

    /**
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function testIndexResponse()
    {
        $authentication = $this->createMock(AuthenticationUtils::class);
        $loginController = new LoginController(
            $this->twig
        );

        static::assertInstanceOf(
            Response::class,
            $loginController->index($authentication)
        );
    }
}