<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 11:32
 */

namespace App\UI\Action;


use App\Domain\Models\User;
use App\Event\UserCreatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class TestAction
{
    private $eventDispatcher;

    /**
     * TestAction constructor.
     * @param $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public function __invoke()
    {
        $user = new User();
        $this->eventDispatcher->dispatch(UserCreatedEvent::NAME, new UserCreatedEvent($user));
    }




}