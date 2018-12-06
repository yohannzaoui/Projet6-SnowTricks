<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 22/11/2018
 * Time: 11:14
 */

namespace App\Command\Interfaces;

use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Repository\UserRepository;

/**
 * Interfaces CreateUserCommandInterface
 * @package App\Command\Interfaces
 */
interface CreateUserCommandInterface
{
    /**
     * CreateUserCommandInterface constructor.
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserRepository $userRepository
     * @param bool $username
     * @param bool $password
     * @param bool $email
     */
    public function __construct(
        EncoderFactoryInterface $encoderFactory,
        UserRepository $userRepository,
        $username = true,
        $password = true,
        $email = true
    );
}