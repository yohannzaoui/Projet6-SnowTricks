<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 28/11/2018
 * Time: 14:22
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Guard\Token\PostAuthenticationGuardToken;
use Symfony\Component\BrowserKit\Cookie;

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
            200,
            $this->client->getResponse()->getStatusCode()
        );
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

        $this->assertSame(1,
            $crawler->filter('html:contains("Gestion des catégories")')->count());

        static::assertEquals(
            Response::HTTP_OK,
            $this->client->getResponse()->getStatusCode()
        );
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');
        $user = $this->createMock(UserInterface::class);

        //$firewallName = 'secure_area';
        // if you don't define multiple connected firewalls, the context defaults to the firewall name
        // See https://symfony.com/doc/current/reference/configuration/security.html#firewall-context
        $firewallContext = 'secured_area';

        // you may need to use a different token class depending on your application.
        // for example, when using Guard authentication you must instantiate PostAuthenticationGuardToken
        $token = new PostAuthenticationGuardToken($user, "main", array('ROLE_ADMIN'));
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }


}

