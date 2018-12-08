<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 20:50
 */

namespace App\Tests\Controller;


use App\Controller\DeleteCategoryController;
use App\Controller\Interfaces\DeleteCategoryControllerInterface;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class DeleteCategoryControllerTest
 * @package App\Tests\Controller
 */
class DeleteCategoryControllerTest extends KernelTestCase
{


    /**
     *
     */
    public function testConstruct()
    {
        $messageFlash = $this->createMock(SessionInterface::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $categoryRepository = $this->createMock(CategoryRepository::class);

        $deleteCategoryController = new DeleteCategoryController(
            $categoryRepository,
            $messageFlash,
            $urlGenerator
        );

        static::assertInstanceOf(DeleteCategoryControllerInterface::class, $deleteCategoryController);
    }

    public function testWrongIdCategory()
    {
        $messageFlash = $this->createMock(SessionInterface::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator->method('generate')
            ->willReturn('/category');
        $categoryRepository = $this->createMock(CategoryRepository::class);
        $request = $this->createMock(Request::class);

        //$this->expectException(NonUniqueResultException::class);

        $deleteCategoryController = new DeleteCategoryController(
            $categoryRepository,
            $messageFlash,
            $urlGenerator
        );

        static::assertInstanceOf(
            RedirectResponse::class,
            $deleteCategoryController->index($request)
        );
    }
}