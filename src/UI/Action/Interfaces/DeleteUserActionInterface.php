<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 15:33
 */

namespace App\UI\Action\Interfaces;

use App\Domain\Repository\UserRepository;
use App\UI\Responder\Interfaces\DeleteUserActionResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface DeleteUserActionInterface
 * @package App\UI\Action\Interfaces
 */
interface DeleteUserActionInterface
{
    /**
     * DeleteUserActionInterface constructor.
     * @param UserRepository $userRepository
     * @param Session $messageFlash
     */
    public function __construct(UserRepository $userRepository, SessionInterface $messageFlash);

    /**
     * @param Request $request
     * @param DeleteUserActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, DeleteUserActionResponderInterface $responder);
}