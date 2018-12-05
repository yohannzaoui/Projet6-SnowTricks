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
        $this->encoder = static::$kernel->getContainer()->get('security.encoder_factory');

        $encode = new Encoder(
            $this->encoder
        );

        static::assertInstanceOf(EncoderInterface::class,$encode);
    }
}