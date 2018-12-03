<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 20:24
 */

namespace App\Tests\Form;

use App\Form\ForgotPasswordValidationType;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Entity\User;
use Ramsey\Uuid\UuidInterface;

class ForgotPasswordValidationTypeTest extends TypeTestCase
{
    public function testForm()
    {
        $uuid = $this->createMock(UuidInterface::class);
        $date = $this->createMock(\DateTime::class);

        $formData = [
            'password' => [
                'first' => 'pass',
                'second' => 'pass'
            ]
        ];

        $userToCompare = $this->createMock(User::class);

        $form = $this->factory->create(ForgotPasswordValidationType::class, $userToCompare);

        $user = $this->createMock(User::class);
        $user->setId($uuid);
        $user->setUsername('username');
        $user->setPassword('pass');
        $user->setEmail('email@mail.com');
        $user->setProfilImage('image');
        $user->setRoles(['ROLE_USER']);
        $user->setCreatedAt($date);

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($user, $userToCompare);
    }
}