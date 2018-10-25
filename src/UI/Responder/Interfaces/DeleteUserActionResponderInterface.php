<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 25/10/2018
 * Time: 15:30
 */

namespace App\UI\Responder\Interfaces;

use Twig\Environment;


interface DeleteUserActionResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke();
}