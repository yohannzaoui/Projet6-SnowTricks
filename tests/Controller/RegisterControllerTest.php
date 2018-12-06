<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 22:32
 */

namespace App\Tests\Controller;


use App\Controller\Interfaces\RegisterControllerInterface;
use App\Controller\RegisterController;
use App\FormHandler\RegisterFormHandler;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class RegisterControllerTest
 * @package App\Tests\Controller
 */
class RegisterControllerTest extends KernelTestCase
{
    /**
     * @var RegisterFormHandler
     */
    private $registerFormHandler;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var Environment
     */
    private $twig;


    /**
     *
     */
    public function setUp()
    {
        $this->registerFormHandler = $this->createMock(
            RegisterFormHandler::class
        );
        $this->formFactory = $this->createMock(
          FormFactoryInterface::class
        );
        $this->urlGenerator = $this->createMock(
          UrlGeneratorInterface::class
        );
        $this->twig = $this->createMock(
          Environment::class
        );
    }

    /**
     *
     */
    public function testConstruct()
    {
        $registerController = new RegisterController(
            $this->registerFormHandler,
            $this->formFactory,
            $this->urlGenerator,
            $this->twig
        );

        static::assertInstanceOf(
          RegisterControllerInterface::class,
          $registerController
        );
    }
}