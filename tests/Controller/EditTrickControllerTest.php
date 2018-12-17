<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 12:20
 */

namespace App\Tests\Controller;


use App\Controller\EditTrickController;
use App\Controller\Interfaces\EditTrickControllerInterface;
use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class EditTrickControllerTest
 * @package App\Tests\Controller
 */
class EditTrickControllerTest extends KernelTestCase
{


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
        $editTrickHandler = $this->createMock(
            EditTrickHandlerInterface::class
        );
        $editTrickHandler->method('handle')
            ->willReturn($handle);

        $trickRepository = $this->createMock(
            TrickRepository::class
        );
        $form = $this->createMock(
            FormInterface::class
        );
        $form->method('handleRequest')
            ->willReturn($form)
            ;
        $formFactory = $this->createMock(
            FormFactoryInterface::class
        );
        $formFactory->method('create')
            ->willReturn($form)
            ;
        $tokenStorage = $this->createMock(
            TokenStorageInterface::class
        );
        $urlGenerator = $this->createMock(
            UrlGeneratorInterface::class
        );
        $urlGenerator->method('generate')
            ->willReturn('/')
            ;
        $twig = $this->createMock(
            Environment::class
        );
        $request = $this->createMock(Request::class);

        $this->expectException(NotFoundHttpException::class);


        $editTrickController = new EditTrickController(
            $editTrickHandler,
            $trickRepository,
            $formFactory,
            $tokenStorage,
            $urlGenerator,
            $twig
        );

        static::assertInstanceOf(
            $class,
            $editTrickController->index($request)
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