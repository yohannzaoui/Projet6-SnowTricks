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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ConfirmeRegisterControllerTest
 * @package App\Tests\Controller
 */
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
        $this->userRepository = $this->createMock(UserRepository::class);
    }

    /**
     *
     */
    public function testConstruct()
    {

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


    public function testRedirection()
    {
        $request = $this->createMock(Request::class);

        $confirmeRegisterController = new ConfirmeRegisterController(
            $this->userRepository,
            $this->messageFlash,
            $this->twig,
            $this->urlGenerator
        );

        static::assertSame(RedirectResponse::class, $confirmeRegisterController->index($request));
    }

    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function testResponse()
    {
        $request = $this->createMock(Request::class);

        $confirmeRegisterController = new ConfirmeRegisterController(
            $this->userRepository,
            $this->messageFlash,
            $this->twig,
            $this->urlGenerator
        );

        static::assertSame(Response::class, $confirmeRegisterController->index($request));
    }

}