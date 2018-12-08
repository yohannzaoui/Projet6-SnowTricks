<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 09:06
 */

namespace App\Tests\Controller;


use App\Controller\Interfaces\TrickControllerInterface;
use App\Controller\TrickController;
use App\FormHandler\CommentHandler;
use App\FormHandler\Interfaces\CommentHandlerInterface;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class TrickControllerTest
 * @package App\Tests\Controller
 */
class TrickControllerTest extends TestCase
{

    public function testConstruct()
    {
        $trickRepository = $this->createMock(
            TrickRepository::class
        );
        $commentRepository = $this->createMock(
            CommentRepository::class
        );
        $commentHandler = $this->createMock(
            CommentHandlerInterface::class
        );
        $formFactory = $this->createMock(
            FormFactoryInterface::class
        );
        $urlGenerator = $this->createMock(
            UrlGeneratorInterface::class
        );
        $tokenStorage = $this->createMock(
            TokenStorageInterface::class
        );
        $twig = $this->createMock(
            Environment::class
        );


        $trickController = new TrickController(
            $trickRepository,
            $commentHandler,
            $commentRepository,
            $formFactory,
            $urlGenerator,
            $tokenStorage,
            $twig
        );

        static::assertInstanceOf(
            TrickControllerInterface::class,
            $trickController
            );
    }

    /**
     * @dataProvider dataHandler
     * @param $class
     * @param $handle
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function testIndexResponse($class, $handle)
    {
        $commentHandler = $this->createMock(CommentHandler::class);
        $commentHandler
            ->method("handle")
            ->willReturn($handle)
        ;

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

        $this->expectException(NotFoundHttpException::class);


        $trickRepository = $this->createMock(
            TrickRepository::class
        );
        $commentRepository = $this->createMock(
            CommentRepository::class
        );
        $commentHandler = $this->createMock(
            CommentHandlerInterface::class
        );
        $formFactory = $this->createMock(
            FormFactoryInterface::class
        );
        $urlGenerator = $this->createMock(
            UrlGeneratorInterface::class
        );
        $tokenStorage = $this->createMock(
            TokenStorageInterface::class
        );
        $twig = $this->createMock(
            Environment::class
        );


        $request = $this->createMock(Request::class);


        $trickController = new TrickController(
            $trickRepository,
            $commentHandler,
            $commentRepository,
            $formFactory,
            $urlGenerator,
            $tokenStorage,
            $twig
        );

        $this->assertInstanceOf(
            $class,
            $trickController->index($request)
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