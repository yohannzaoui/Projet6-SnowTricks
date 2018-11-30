<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 16:47
 */

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DeleteCategoryControllerFunctionalTest extends WebTestCase
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
    public function testDeleteCategoryPageIsFound()
    {
        $this->client->request('GET', '/supprimerCategorie/{id}');

        static::assertEquals(
            Response::HTTP_FOUND,
            $this->client->getResponse()->getStatusCode()
        );
    }


}