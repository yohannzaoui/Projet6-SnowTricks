<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/12/2018
 * Time: 16:43
 */

namespace App\Services;


use App\Services\Interfaces\EncoderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class Encoder
 * @package App\Services
 */
class Encoder implements EncoderInterface
{

    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

    /**
     * Encoder constructor.
     * @param EncoderFactoryInterface $encoder
     */
    public function __construct(EncoderFactoryInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param $class
     * @param $password
     * @return string
     */
    public function encodePassword($class, $password): string
    {
        return $this->encoder->getEncoder($class)
            ->encodePassword($password, null)
        ;
    }
}