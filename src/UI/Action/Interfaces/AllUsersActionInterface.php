<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 15:42
 */

namespace App\UI\Action\Interfaces;

use App\Domain\Repository\UserRepository;
use App\UI\Responder\Interfaces\AllUsersActionResponderInterface;

/**
 * Interface AllUsersActionInterface
 * @package App\UI\Action\Interfaces
 */
interface AllUsersActionInterface
{
    /**
     * AllUsersActionInterface constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository);

    /**
     * @param AllUsersActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(AllUsersActionResponderInterface $responder);
}