<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 13:30
 */

namespace App\Tests\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddTrickControllerFunctionalTest extends WebTestCase
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

    /*public function testAddTrickPageIsFound()
    {
        $this->client->request('GET', '/ajouterTrick');

        static::assertEquals(
            Response::HTTP_FOUND,
            $this->client->getResponse()->getStatusCode()
        );
    }*/

    /*public function testAddTrickForm()
    {
        $crawler = $this->client->request('GET', '/ajouterTrick');

        $form = $crawler->selectButton('add')->form();

        $form['add_trick[name]'] = 'trick functional test';
        $form['add_trick[category]'] = 'Flips';
        $form['add_trick[defaultImage]'] = 'defaultImage';
        $form['add_trick[description]'] = 'description';

        $this->client->submit($form);

        echo $this->client->getResponse()->getContent();
    }*/
}