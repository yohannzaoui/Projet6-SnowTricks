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
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class HomeControllerTest
 * @package App\Tests\Controller
 */
class HomeControllerTest extends TestCase
{

    /**
     *
     */
    public function testConstruct()
    {
        $trickRepository = $this->createMock(TrickRepository::class);
        $twig = $this->createMock(Environment::class);

        $homeController = new HomeController(
          $trickRepository,
          $twig
        );

        static::assertInstanceOf(
          HomeControllerInterface::class,
          $homeController
        );
    }
}