<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 20:35
 */

namespace App\Tests\Controller;


use App\Controller\ConfirmeRegisterController;
use App\Controller\Interfaces\ConfirmeRegisterControllerInterface;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ConfirmeRegisterControllerTest extends KernelTestCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var SessionInterface
     */
    private $messageFlash;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    public function setUp()
    {
        static::bootKernel();

        $this->twig = static::$kernel->getContainer()->get('twig');
        $this->messageFlash = static::$kernel->getContainer()->get('session');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
    }

    /**
     *
     */
    public function testConstruct()
    {
        $this->userRepository = $this->createMock(UserRepository::class);

        $confirmeRegisterController = new ConfirmeRegisterController(
          $this->userRepository,
          $this->messageFlash,
          $this->twig,
          $this->urlGenerator
        );

        static::assertInstanceOf(
            ConfirmeRegisterControllerInterface::class,
            $confirmeRegisterController
        );
    }
}