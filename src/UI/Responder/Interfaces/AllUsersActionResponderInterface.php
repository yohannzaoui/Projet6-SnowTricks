<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 13:59
 */

namespace App\UI\Responder\Interfaces;

use Twig\Environment;


interface AllUsersActionResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke($users);
}