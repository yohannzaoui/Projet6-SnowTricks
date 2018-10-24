<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 23/10/2018
 * Time: 18:10
 */

namespace App\Domain\Builder\Interfaces;


interface VideoBuilderInterface
{
    public function create($url);

    public function getVideo();
}