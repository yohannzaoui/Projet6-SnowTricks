<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 26/11/2018
 * Time: 20:34
 */

namespace App\Tests\Form;


use App\Form\ForgotPasswordType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class ForgotPasswordTypeTest
 * @package App\Tests\Form
 */
class ForgotPasswordTypeTest extends TypeTestCase
{
    /**
     * @throws \Exception
     */
    public function testForgotPasswordTypeWithData()
    {
        $form = $this->factory->create(ForgotPasswordType::class);

        $form->submit(['email' => 'email@email.com']);

        $this->assertTrue($form->isSubmitted());

        $this->assertSame(['email' => 'email@email.com'], $form->getData());

        $this->assertTrue($form->isValid());
    }
}