<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 17:29
 */

namespace App\Tests\Services;


use App\Services\Encoder;
use App\Services\Interfaces\EncoderInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class EncoderTest
 * @package App\Tests\Services
 */
class EncoderTest extends KernelTestCase
{
    /**
     * @var
     */
    private $encoder;

    /**
     *
     */
    public function testConstruct()
    {
        static::bootKernel();
        $this->encoder = $this->createMock(EncoderFactoryInterface::class);

        $encode = new Encoder(
            $this->encoder
        );

        static::assertInstanceOf(EncoderInterface::class,$encode);
    }
}