<?php

namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\UserBuilderInterface;
use App\Domain\Models\Interfaces\ImageInterface;
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
     * @param ImageInterface|null $profilImage
     * @return $this|mixed
     * @throws \Exception
     */
    public function createFromRegistration($username, $password, $email, $token, ImageInterface $profilImage)
    {
        $this->user = new User($username, $password, $email, $token, $profilImage);
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