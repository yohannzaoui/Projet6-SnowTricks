<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 14:22
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CategoryControllerFunctionalTest
 * @package App\Tests\Controller
 */
class CategoryControllerFunctionalTest extends WebTestCase
{
    /**
     * @var null
     */
    private $client = null;

    /**
     *
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     *
     */
    public function testCategoryPageIsFound()
    {
        $this->client->request('GET', '/category');

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     *
     */
    public function testCategoryPageWhenSelectCategory()
    {
        $crawler = $this->client->request('GET', '/editCategory/{id}');

        $this->assertSame(1,
            $crawler->filter('html:contains("Gestion des catégories")')->count());

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     *
     */
    public function testAddCategory()
    {
        $crawler = $this->client->request('GET', '/category');

        $form = $crawler->selectButton('add')->form();

        $category = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $form['category[name]'] = $category;

        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertSame(1,
            $crawler->filter('div.alert.alert-dismissible.alert-warning')->count());
    }


}

