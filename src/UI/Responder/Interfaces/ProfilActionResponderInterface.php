<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:21
 */

namespace App\UI\Responder\Interfaces;

use Twig\Environment;


interface ProfilActionResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke($redirect, $form);

}