<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 10:21
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeControllerFunctionalTest
 * @package App\Tests\Controller
 */
class HomeControllerFunctionalTest extends WebTestCase
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
     * @throws \Exception
     */
    public function testHomepageIsFound()
    {
        $this->client->request('GET', '/');

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     *
     */
    public function testHomePage()
    {
        $crawler = $this->client->request('GET', '/');

        $this->assertSame(1,
            $crawler->filter('html:contains("Snow Tricks")')->count());

        $link = $crawler->selectLink('Accueil')->link();
        $crawler = $this->client->click($link);

        $this->assertSame(1,
            $crawler->filter('html:contains("Ajouté le")')->count()
        );
    }


}