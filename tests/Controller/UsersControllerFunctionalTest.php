<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 20:12
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UsersControllerFunctionalTest
 * @package App\Tests\Controller
 */
class UsersControllerFunctionalTest extends WebTestCase
{
    /**
     * @var
     */
    private $client;

    /**
     *
     */
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testUserPageIsFound()
    {
        $this->client->request('GET', '/allUsers');

        static::assertEquals(
            302,
            $this->client->getResponse()->getStatusCode()
        );
    }




    /*public function testAllUsersPageIsFound()
    {
        $crawler = $this->client->request('GET', '/allUsers');

        $this->assertSame(1,
            $crawler->filter('html:contains("Gestion des membres")')->count());

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }*/
}