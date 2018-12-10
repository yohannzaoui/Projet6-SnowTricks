<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 20:33
 */

namespace App\Tests\Form;


use App\Entity\User;
use App\Form\ImageProfileType;
use Symfony\Component\Form\Test\TypeTestCase;
use Ramsey\Uuid\UuidInterface;
use App\Form\Interfaces\TypeInterface;

/**
 * Class ImageProfileTypeTest
 * @package App\Tests\Form
 */
class ImageProfileTypeTest extends TypeTestCase
{

    /**
     *
     */
    public function testInterface()
    {
        $form = $this->createMock(ImageProfileType::class);

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
            'file' => 'image'
        ];

        $userToCompare = $this->createMock(User::class);

        $form = $this->factory->create(ImageProfileType::class, $userToCompare);

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