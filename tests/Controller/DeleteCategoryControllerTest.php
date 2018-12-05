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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DeleteCategoryControllerTest extends KernelTestCase
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     *
     */
    public function setUp()
    {
        static::bootKernel();

        $this->messageFlash = static::$kernel->getContainer()->get('session');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
        $this->categoryRepository = $this->createMock(CategoryRepository::class);
    }

    /**
     *
     */
    public function testConstruct()
    {

        $deleteCategoryController = new DeleteCategoryController(
            $this->categoryRepository,
            $this->messageFlash,
            $this->urlGenerator
        );

        static::assertInstanceOf(DeleteCategoryControllerInterface::class, $deleteCategoryController);
    }

    public function testWrongIdCategory()
    {
        $request = Request::create('/supprimerCategorie/{id}','GET');

        $deleteCategoryController = new DeleteCategoryController(
            $this->categoryRepository,
            $this->messageFlash,
            $this->urlGenerator
        );

        $this->expectException('NonUniqueResultException');

        $deleteCategoryController->index($request);
    }
}