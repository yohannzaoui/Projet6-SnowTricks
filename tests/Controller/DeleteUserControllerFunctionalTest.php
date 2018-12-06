<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 20:37
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DeleteUserControllerFunctionalTest
 * @package App\Tests\Controller
 */
class DeleteUserControllerFunctionalTest extends WebTestCase
{

    private $client;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testDeleteUserPageIsFound()
    {
        $this->client->request('GET', '/deleteUser/{id}');

        static::assertEquals(
            Response::HTTP_FOUND,
            $this->client->getResponse()->getStatusCode()
        );
    }



    /*public function testDeleteUser()
    {
        $crawler = $this->client->request('GET', '/deleteUser/{id}');

        $link = $crawler->selectLink('Supprimer')->link();
        $this->client->click($link);

        $crawler = $this->client->followRedirect();

        $this->assertSame(1,
            $crawler->filter('div.alert.alert-dismissible.alert-warning')->count());

    }*/
}