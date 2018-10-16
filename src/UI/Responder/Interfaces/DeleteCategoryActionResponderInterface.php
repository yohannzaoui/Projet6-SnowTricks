<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 15/10/2018
 * Time: 13:02
 */

namespace App\UI\Responder\Interfaces;

use Twig\Environment;


interface DeleteCategoryActionResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke();

}