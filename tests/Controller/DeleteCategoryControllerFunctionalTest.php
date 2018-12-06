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

/**
 * Class DeleteCategoryControllerFunctionalTest
 * @package App\Tests\Controller
 */
class DeleteCategoryControllerFunctionalTest extends WebTestCase
{


    /**
     *
     */
    public function testDeleteCategoryPageIsFound()
    {
        $client = static::createClient();
        $client->request('GET', '/supprimerCategorie/{id}');

        static::assertSame(
            Response::HTTP_FOUND,
            $client->getResponse()->getStatusCode()
        );
    }


}