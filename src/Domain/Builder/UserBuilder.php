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
     * @param $image
     * @param $token
     * @return $this|mixed
     * @throws \Exception
     */
    public function createFromRegistration($username, $password, $email, ImageBuilder $image, $token)
    {
        $this->user = new User($username, $password, $email, $image->getImage(), $token);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }
}