<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 14:22
 */

namespace App\Tests\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Class CategoryControllerFunctionalTest
 * @package App\Tests\Controller
 */
class CategoryControllerFunctionalTest extends WebTestCase
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
    public function testCategoryPageIsFound()
    {
        $this->client->request('GET', '/category');

        static::assertEquals(
            302,
            $this->client->getResponse()->getStatusCode()
        );
    }

    /**
     *
     */
    public function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        // the firewall context (defaults to the firewall name)
        $firewall = 'main';

        $token = new UsernamePasswordToken(User::class, null, $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();
    }

    /**
     *
     */
    public function testAddCategory()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/category');

        $form = $crawler->selectButton('add')->form();

        $category = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $form['category[name]'] = $category;

        $this->client->submit($form);

        $crawler = $this->client->followRedirect();

        $this->assertSame(1,
            $crawler->filter('div.alert.alert-dismissible.alert-warning')->count());
    }

    /**
     *
     */
    public function testCategoryPageWhenSelectCategory()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/editCategory/{id}');

        $this->assertSame(0,
            $crawler->filter('html:contains("Gestion des catégories")')->count());

        static::assertEquals(
            Response::HTTP_FOUND,
            $this->client->getResponse()->getStatusCode()
        );
    }


}

