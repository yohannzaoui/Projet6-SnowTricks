<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 17:36
 */

namespace App\Tests\Controller;


use App\Controller\ForgotPasswordValidationController;
use App\Controller\Interfaces\ForgotPasswordValidationControllerInterface;
use App\FormHandler\ForgotPasswordValidationTypeHandler;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Repository\UserRepository;
use Symfony\Component\Form\FormFactoryInterface;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class ForgotPasswordValidationControllerTest
 * @package App\Tests\Controller
 */
class ForgotPasswordValidationControllerTest extends KernelTestCase
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * @var ForgotPasswordValidationTypeHandler
     */
    private $forgotPasswordValidationTypeHandler;


    /**
     *
     */
    public function setUp()
    {
        static::bootKernel();

        $this->userRepository = $this->createMock(UserRepository::class);
        $this->formFactory = static::$kernel->getContainer()->get('form.factory');
        $this->twig = static::$kernel->getContainer()->get('twig');
        $this->urlGenerator = static::$kernel->getContainer()->get('router');
        $this->forgotPasswordValidationTypeHandler = $this->createMock(ForgotPasswordValidationTypeHandler::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $forgotPasswordValidationController = new ForgotPasswordValidationController(
            $this->userRepository,
            $this->forgotPasswordValidationTypeHandler,
            $this->formFactory,
            $this->twig,
            $this->urlGenerator
        );

        static::assertInstanceOf(
            ForgotPasswordValidationControllerInterface::class,
            $forgotPasswordValidationController
        );
    }


}