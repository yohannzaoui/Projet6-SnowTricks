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
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RegisterControllerTest
 * @package App\Tests\Controller
 */
class RegisterControllerTest extends TestCase
{

    /**
     *
     */
    public function testConstruct()
    {
        $registerFormHandler = $this->createMock(
            RegisterFormHandler::class
        );
        $formFactory = $this->createMock(
            FormFactoryInterface::class
        );
        $urlGenerator = $this->createMock(
            UrlGeneratorInterface::class
        );
        $twig = $this->createMock(
            Environment::class
        );

        $registerController = new RegisterController(
            $registerFormHandler,
            $formFactory,
            $urlGenerator,
            $twig
        );

        static::assertInstanceOf(
          RegisterControllerInterface::class,
          $registerController
        );
    }

    /**
     * @dataProvider dataHandler
     * @param $class
     * @param $handle
     * @throws \Exception
     */
    public function testIndexResponse(bool $handle, string $class)
    {

        $registerFormHandler = $this->createMock(
            RegisterFormHandler::class
        );
        $registerFormHandler->method('handle')
            ->willReturn($handle);

        $form = $this->createMock(FormInterface::class);
        $form->method('handleRequest')
            ->willReturn($form);

        $formFactory = $this->createMock(
            FormFactoryInterface::class
        );
        $formFactory->method('create')
            ->willReturn($form);

        $urlGenerator = $this->createMock(
            UrlGeneratorInterface::class
        );
        $urlGenerator->method('generate')
            ->willReturn('/');

        $twig = $this->createMock(
            Environment::class
        );

        $registerController = new RegisterController(
            $registerFormHandler,
            $formFactory,
            $urlGenerator,
            $twig
        );

        $request = $this->createMock(Request::class);

        static::assertInstanceOf(
            $class,
            $registerController->index($request)
        );
    }

    /**
     * @return array
     */
    public function dataHandler()
    {
        return [
            [
                "handle" => false,
                "class" => Response::class
            ],
            [
                "handle" => true,
                "class" => RedirectResponse::class
            ],
        ];
    }
}