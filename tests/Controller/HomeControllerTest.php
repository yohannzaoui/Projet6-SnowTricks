<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 22:24
 */

namespace App\Tests\Controller;


use App\Controller\HomeController;
use App\Controller\Interfaces\HomeControllerInterface;
use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class HomeControllerTest
 * @package App\Tests\Controller
 */
class HomeControllerTest extends KernelTestCase
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;

    /**
     * @var Environment
     */
    private $twig;

    /**
     *
     */
    public function setUp()
    {
        $this->trickRepository = $this->createMock(TrickRepository::class);
        $this->twig = $this->createMock(Environment::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $homeController = new HomeController(
          $this->trickRepository,
          $this->twig
        );

        static::assertInstanceOf(
          HomeControllerInterface::class,
          $homeController
        );
    }

    public function testResponse()
    {
        $request = $this->createMock(Request::class);

        $homeController = new HomeController(
            $this->trickRepository,
            $this->twig
        );

        static::assertSame(Response::class, $homeController->index($request));
    }
}