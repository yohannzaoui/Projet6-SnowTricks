<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 15:16
 */

namespace App\Tests\Controller;

use App\Controller\AddTrickController;
use App\Controller\Interfaces\AddTrickControllerInterface;
use App\FormHandler\AddTrickHandler;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Twig\Environment;

/**
 * Class AddTrickControllerTest
 * @package App\Tests\Controller
 */
class AddTrickControllerTest extends TestCase
{
    /**
     *
     */
    public function testConstruct()
    {
        $addTrickHandler = $this->createMock(AddTrickHandler::class);
        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $twig = $this->createMock(Environment::class);
        $formFactory = $this->createMock(FormFactoryInterface::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);

        $addTrickController = new AddTrickController(
            $addTrickHandler,
            $tokenStorage,
            $twig,
            $formFactory,
            $urlGenerator
        );

        static::assertInstanceOf(AddTrickControllerInterface::class, $addTrickController);

    }



    /**
     * @dataProvider dataHandler
     * @param bool $handle
     * @param string $class
     * @throws \Exception
     */
    public function testIndex(bool $handle, string $class)
    {
        $addTrickHandler = $this->createMock(AddTrickHandler::class);

        $addTrickHandler
            ->method("handle")
            ->willReturn($handle)
        ;

        $user = $this->createMock(UserInterface::class);

        $token = $this->createMock(TokenInterface::class);

        $token
            ->method("getUser")
            ->willReturn($user)
        ;

        $tokenStorage = $this->createMock(TokenStorageInterface::class);

        $tokenStorage
            ->method("getToken")
            ->willReturn($token)
        ;

        $twig = $this->createMock(Environment::class);


        $form = $this->createMock(FormInterface::class);

        $form
            ->method("handleRequest")
            ->willReturn($form)
        ;

        $formFactory = $this->createMock(FormFactoryInterface::class);

        $formFactory
            ->method("create")
            ->willReturn($form)
        ;

        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);

        $urlGenerator
            ->method("generate")
            ->willReturn("/")
        ;

        $request = $this->createMock(Request::class);

        $addTrickController = new AddTrickController(
            $addTrickHandler,
            $tokenStorage,
            $twig,
            $formFactory,
            $urlGenerator
        );

        $this->assertInstanceOf(
            $class,
            $addTrickController->index($request)
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