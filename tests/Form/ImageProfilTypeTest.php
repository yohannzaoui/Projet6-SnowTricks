<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 20:33
 */

namespace App\Tests\Form;


use App\Entity\Image;
use App\Entity\Trick;
use App\Entity\User;
use App\Form\ImageProfilType;
use Symfony\Component\Form\Test\TypeTestCase;
use Ramsey\Uuid\UuidInterface;

/**
 * Class ImageProfilTypeTest
 * @package App\Tests\Form
 */
class ImageProfilTypeTest extends TypeTestCase
{
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

        $form = $this->factory->create(ImageProfilType::class, $userToCompare);

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

        $this->assertInstanceOf(User::class, $form->getData());
    }
}