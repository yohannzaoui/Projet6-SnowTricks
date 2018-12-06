<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 11:36
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RegisterControllerFunctionalTest
 * @package App\Tests\Controller
 */
class RegisterControllerFunctionalTest extends WebTestCase
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
    public function testLoginPageIsFound()
    {
        $this->client->request('GET', '/register');

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     *
     */
    public function testIfFormIsSubmitted()
    {
        $crawler =$this->client->request('POST', '/register');

        $form = $crawler->selectButton("S'inscrire")->form();

        $form['register[username]'] = 'user';
        $form['register[email]'] = 'mail@mail.com';
        $form['register[profilImage]'] = 'image.jpeg';
        $form['register[password][first]'] = 'password';
        $form['register[password][second]'] = 'password';

        $this->client->submit($form);

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }
}