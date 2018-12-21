<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 11:07
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EditTrickControllerFunctionalTest
 * @package App\Tests\Controller
 */
class EditTrickControllerFunctionalTest extends WebTestCase
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

    public function testEditTrickPageIsFound()
    {
        $crawler = $this->client->request('GET', '/edit/trick/switch-back-540');

        $this->assertSame(0,
            $crawler->filter('html:contains("Modifier un Trick")')->count());

        static::assertEquals(
            Response::HTTP_FOUND,
            $this->client->getResponse()->getStatusCode()
        );
    }
}