<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 19:54
 */

namespace App\Tests\Controller;


use App\Controller\CategoryController;
use App\Controller\Interfaces\CategoryControllerInterface;
use App\Entity\Category;
use App\FormHandler\Interfaces\CategoryHandlerInterface;
use App\Repository\CategoryRepository;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class CategoryControllerTest
 * @package App\Tests\Controller
 */
class CategoryControllerTest extends TestCase
{

    /**
     *
     */
    public function testConstruct()
    {
        $categoryHandler = $this->createMock(CategoryHandlerInterface::class);
        $categoryRepository = $this->createMock(CategoryRepository::class);
        $twig = $this->createMock(Environment::class);
        $formFactory = $this->createMock(FormFactoryInterface::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);

        $categoryController = new CategoryController(
            $categoryRepository,
            $categoryHandler,
            $twig,
            $formFactory,
            $urlGenerator
        );

        static::assertInstanceOf(
            CategoryControllerInterface::class,
            $categoryController
        );
    }

    /**
     * @dataProvider dataHandler
     * @param $handle
     * @param $class
     * @throws \Exception
     */
    public function testIndexResponse($handle, $class)
    {
        $categoryRepository = $this->createMock(CategoryRepository::class);

        $twig = $this->createMock(Environment::class);

        $categoryHandler = $this->createMock(CategoryHandlerInterface::class);
        $categoryHandler->method('handle')
            ->willReturn($handle);

        $form = $this->createMock(FormInterface::class);
        $form->method('handleRequest')
            ->willReturn($form);

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
        $request
            ->method('get')
            ->willReturn('id' ==!null);
        $category = $this->createMock(Category::class);

        $categoryController = new CategoryController(
            $categoryRepository,
            $categoryHandler,
            $twig,
            $formFactory,
            $urlGenerator
        );

        $this->assertInstanceOf(
            $class,
            $categoryController->index($request, $category)
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