<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 16:29
 */

namespace App\Tests\FormHandler;


use App\FormHandler\CategoryHandler;
use App\FormHandler\Interfaces\CategoryHandlerInterface;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CategoryHandlerTest extends WebTestCase
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
     *
     */
    public function setUp()
    {
        $this->categoryRepository = $this->createMock(CategoryRepository::class);
        $this->messageFlash = $this->createMock(SessionInterface::class);
    }

    /**
     *
     */
    public function testConstruct()
    {
        $categoryHandler = new CategoryHandler(
          $this->categoryRepository,
          $this->messageFlash
        );

        static::assertInstanceOf(CategoryHandlerInterface::class, $categoryHandler);
    }

    /*public function testIfFormIsSubmited()
    {
        $this->assertTrue();
    }*/
}