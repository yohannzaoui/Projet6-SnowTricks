<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 08/12/2018
 * Time: 09:23
 */

namespace App\Tests\Form;


use App\Entity\Trick;
use App\Form\AddTrickType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Test\TypeTestCase;
use Ramsey\Uuid\UuidInterface;

class AddTrickTypeTest extends TypeTestCase
{
    public function testForm()
    {
        $uuid = $this->createMock(UuidInterface::class);

        $arrayCollection = $this->createMock(ArrayCollection::class);

        $formData = [
            'id' => $uuid,
            'name' => 'test',
            'description' => 'description',
            'defaultImage' => 'defaultImage',
            'images' => $arrayCollection,
            'videos' => $arrayCollection,
            'comment' => $arrayCollection,
            'author' => 'author',
            'category' => 'catTest',
            'createdAt' => new \DateTime(),
            'updatedAt' => '',
            'slug' => 'slug'

        ];

        $trickToCompare = $this->createMock(Trick::class);

        $form = $this->factory->create(AddTrickType::class, $trickToCompare);

        $collection = $this->createMock(ArrayCollection::class);

        $trick = $this->createMock(Trick::class);
        $trick->setId($uuid);
        $trick->setName('trick');
        $trick->setDescription('description');
        $trick->setDefaultImage('defaultImage');
        $trick->addImage($collection);
        $trick->addVideo($collection);
        $trick->setComment($collection);
        $trick->setAuthor('author');

        $trick->setCategory('catTest');

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($trick, $trickToCompare);

        $this->assertInstanceOf(Trick::class, $form->getData());
    }
}