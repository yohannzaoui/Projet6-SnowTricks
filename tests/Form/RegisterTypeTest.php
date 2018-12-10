<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 17:38
 */

namespace App\Tests\Form;


use App\Entity\User;
use App\Form\RegisterType;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\Interfaces\TypeInterface;

/**
 * Class RegisterTypeTest
 * @package App\Tests\Form
 */
class RegisterTypeTest extends TypeTestCase
{

    /**
     *
     */
    public function testInterface()
    {
        $form = $this->createMock(RegisterType::class);

        $this->assertInstanceOf(TypeInterface::class, $form);
    }


    /**
     *
     */
    public function testForm()
    {
        $uuid = $this->createMock(UuidInterface::class);
        $date = $this->createMock(\DateTime::class);

        $formData = [
            'id' => $uuid,
            'username' => 'username',
            'password' => [
                'first' => 'pass',
                'second' => 'pass'
            ],
            'email' => 'email@mail.com',
            'profileImage' => 'image'
        ];

        $userToCompare = $this->createMock(User::class);

        $form = $this->factory->create(RegisterType::class, $userToCompare);

        $user = $this->createMock(User::class);
        $user->setId($uuid);
        $user->setUsername('username');
        $user->setPassword('pass');
        $user->setEmail('email@mail.com');
        $user->setProfileImage('image');
        $user->setRoles(['ROLE_USER']);
        $user->setCreatedAt($date);

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($user, $userToCompare);

        $this->assertInstanceOf(User::class, $form->getData());

    }
}