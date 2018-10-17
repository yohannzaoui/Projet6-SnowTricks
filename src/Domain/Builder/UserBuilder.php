<?php

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Domain\Models\User;

/**
 * Class UserBuilder
 * @package App\Domain\Builder
 */
class UserBuilder implements UserBuilderInterface
{
    /**
     * @var
     */
    private $user;


    /**
     * @param $username
     * @param $password
     * @param $email
     * @param $token
     * @return $this|mixed
     * @throws \Exception
     */
    public function createFromRegistration($username, $password, $email, $token)
    {
        $this->user = new User($username, $password, $email, $token);
        return $this;
    }

    public function resetPassword($password)
    {
        $this->user = new User($password);
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}