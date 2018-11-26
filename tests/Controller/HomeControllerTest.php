<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 16/11/2018
 * Time: 12:39
 */

namespace App\Tests\Controller;


use App\Controller\HomeController;
use App\Repository\TrickRepository;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Twig\Environment;

class HomeControllerTest extends KernelTestCase
{

    /**
     * @var TrickRepository
     */
    private $trickRepository;

    private $twig;

    /**
     * @throws \ReflectionException
     */
    public function setUp()
    {
        //static::bootKernel();

        //$this->twig = static::$kernel->getContainer()->get('twig.configurator.environment');

        $this->trickRepository = $this->createMock(TrickRepository::class);
        $this->trickRepository->method('getAllTricks')->willReturn('trick');
    }

    /**
     * @throws \Exception
     */
    public function testConstructor()
    {
        $homeController = new HomeController($this->trickRepository);
        static::assertInstanceOf(HomeController::class, $homeController);
    }

    public function testIndex()
    {
        $homeController = new HomeController($this->trickRepository);

    }



}