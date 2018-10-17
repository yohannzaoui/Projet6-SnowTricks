<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 17/10/2018
 * Time: 10:51
 */

namespace App\Event;


use Symfony\Component\EventDispatcher\Event;

class TestEvent extends Event
{
    CONST NAME = "test.event";

    public function sayHello()
    {
        echo 'Hello World';
    }
}