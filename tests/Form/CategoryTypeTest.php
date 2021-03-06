<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/12/2018
 * Time: 17:22
 */

namespace App\Tests\Form;

use App\Entity\Category;
use App\Entity\User;
use App\Form\CategoryType;
use App\Form\Interfaces\TypeInterface;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Class CategoryTypeTest
 * @package App\Tests\Form
 */
class CategoryTypeTest extends TypeTestCase
{

    public function testInterface()
    {
        $categoryType = $this->createMock(CategoryType::class);

        $this->assertInstanceOf(TypeInterface::class, $categoryType);
    }




    /**
     *
     */
    public function testForm()
    {
        $uuid = $this->createMock(UuidInterface::class);

        $formData = [
          'id' => $uuid,
          'name' => 'test',
        ];

        $categoryToCompare = $this->createMock(Category::class);

        $form = $this->factory->create(CategoryType::class, $categoryToCompare);

        $category = $this->createMock(Category::class);
        $category->setId($uuid);
        $category->setName('test');

        $form->submit($formData);

        $this->assertTrue($form->isValid());

        $this->assertEquals($category, $categoryToCompare);

        $this->assertInstanceOf(Category::class, $form->getData());
    }
}