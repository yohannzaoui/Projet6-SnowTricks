<?php

namespace App\Domain\Builder;

use App\Domain\Models\User;

class UserBuilder
{
    private $user;

    public function createFromRegistration($username, $password, $email, $token)
    {
        $this->user = new User($username, $password, $email, $token);
        return $this;
    }

    public function getUser()
    {
        return $this->user;
    }
}