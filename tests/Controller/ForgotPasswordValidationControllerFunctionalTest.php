<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/12/2018
 * Time: 18:02
 */

namespace App\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class ForgotPasswordValidationControllerFunctionalTest extends WebTestCase
{

    public function testForgotPasswordValidationPageIsFound()
    {
        $client = static::createClient();

        $client->request('GET', '/forgotPasswordValidation/{token}');

        static::assertEquals(
            Response::HTTP_OK,
            $client->getResponse()->getStatusCode()
        );
    }


    /*public function testFormIsSubmit()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/forgotPasswordValidation/{token}');

        $form = $crawler->selectButton('submit')->form();

        $form['forgot_password_validation[password][first]'] = 'password';
        $form['forgot_password_validation[password][second]'] = 'password';

        $client->submit($form);

        //$this->client->followRedirect();

    }*/
}