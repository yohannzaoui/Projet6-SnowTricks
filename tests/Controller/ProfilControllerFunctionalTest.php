<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/12/2018
 * Time: 23:00
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * Class ProfilControllerFunctionalTest
 * @package App\Tests\Controller
 */
class ProfilControllerFunctionalTest extends WebTestCase
{
    public function testResponse()
    {
        $client = static::createClient();

        $tokenStorage = $this->createMock(TokenStorageInterface::class);
        $tokenStorage->method('getToken')
            ->willReturn('idUser');


        $client->request('GET', '/profil');

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

}