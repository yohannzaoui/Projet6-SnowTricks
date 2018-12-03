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
use App\FormHandler\Interfaces\CategoryHandlerInterface;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class CategoryControllerTest extends KernelTestCase
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var CategoryHandlerInterface
     */
    private $categoryHandler;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

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

        $this->formFactory = static::$kernel->getContainer()->get('form.factory');
        $this->twig = static::$kernel->getContainer()->get('twig');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
    }

    /**
     *
     */
    public function testConstruct()
    {
        $this->categoryHandler = $this->createMock(CategoryHandlerInterface::class);
        $this->categoryHandler->method('handle')->willReturn(true);

        $this->categoryRepository = $this->createMock(CategoryRepository::class);

        $categoryController = new CategoryController(
            $this->categoryRepository,
            $this->categoryHandler,
            $this->twig,
            $this->formFactory,
            $this->urlGenerator
        );

        static::assertInstanceOf(
            CategoryControllerInterface::class,
            $categoryController
        );
    }
}