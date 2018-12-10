<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 10/12/2018
 * Time: 07:41
 */

namespace App\Tests\Form;


use App\Form\AddTrickType;
use Symfony\Component\Form\Test\TypeTestCase;
use App\Form\Interfaces\TypeInterface;

/**
 * Class AddTrickTypeTest
 * @package App\Tests\Form
 */
class AddTrickTypeTest extends TypeTestCase
{
    /**
     *
     */
    public function testInterface()
    {
        $addTrickType = $this->createMock(AddTrickType::class);

        $this->assertInstanceOf(TypeInterface::class, $addTrickType);
    }
}