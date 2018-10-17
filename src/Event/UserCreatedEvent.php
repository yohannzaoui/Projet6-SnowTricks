<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 11:39
 */

namespace App\Event;


use App\Domain\Models\User;
use Symfony\Component\EventDispatcher\Event;

class UserCreatedEvent extends Event
{
    const NAME = 'user.created';

    private $user;

    /**
     * UserCreatedEvent constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

}