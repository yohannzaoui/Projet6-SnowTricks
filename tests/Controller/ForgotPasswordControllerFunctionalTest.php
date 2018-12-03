<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 18:06
 */

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ForgotPasswordControllerFunctionalTest extends WebTestCase
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

    public function testForgotPasswordPageIsFound()
    {
        $crawler = $this->client->request('GET', '/forgot');

        $this->assertSame(1,
            $crawler->filter('html:contains("Mot de passe oublié")')->count());

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     *
     */
    public function testForm()
    {
        $crawler = $this->client->request('GET', '/forgot');

        $form = $crawler->selectButton('add')->form();

        $form['forgot_password[email]'] = 'test@mail.com';

        $this->client->submit($form);

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );



    }
}