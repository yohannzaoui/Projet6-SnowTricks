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
use PHPUnit\Framework\TestCase;
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
class ConfirmeRegisterControllerTest extends TestCase
{

    /**
     *
     */
    public function testConstruct()
    {

        $userRepository = $this->createMock(UserRepository::class);
        $messageFlash = $this->createMock(SessionInterface::class);
        $twig = $this->createMock(Environment::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);

        $confirmeRegisterController = new ConfirmeRegisterController(
          $userRepository,
          $messageFlash,
          $twig,
          $urlGenerator
        );

        static::assertInstanceOf(
            ConfirmeRegisterControllerInterface::class,
            $confirmeRegisterController
        );
    }


    /**
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function testIndexResponse()
    {
        $request = $this->createMock(Request::class);
        $userRepository = $this->createMock(UserRepository::class);
        $messageFlash = $this->createMock(SessionInterface::class);
        $twig = $this->createMock(Environment::class);
        $urlGenerator = $this->createMock(UrlGeneratorInterface::class);
        $urlGenerator
            ->method('generate')
            ->willReturn('/login');

        $confirmeRegisterController = new ConfirmeRegisterController(
            $userRepository,
            $messageFlash,
            $twig,
            $urlGenerator
        );

            $this->assertInstanceOf(
                Response::class,
                $confirmeRegisterController->index($request)
            );
    }
}