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

    public function testAddTrickPageIsFound()
    {
        $this->client->request('GET', '/ajouterTrick');

        static::assertEquals(
            Response::HTTP_FOUND,
            $this->client->getResponse()->getStatusCode()
        );
    }



    /*public function testFormSubmission()
    {
        $crawler = $this->client->request('GET', '/ajouterTrick');

        $form = $crawler->selectButton('add')->form();

        $form['add_trick[name]'] = 'trick';
        $form['add_trick[category]'] = 'category';
        $form['add_trick[defaultImage]'] = 'image.jpg';
        $form['add_trick[images][0][file]'] = 'image.jpg';
        $form['add_trick[videos][0][url'] = 'video';
        $form['add_trick[description]'] = 'description';

        $crawler = $this->client->submit($form);

        $this->assertTrue($crawler->filter('html:contains("Ajouter un Trick")')->count() > 0);
    }*/


}