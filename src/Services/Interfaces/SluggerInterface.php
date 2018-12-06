<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 12:46
 */

namespace App\Services\Interfaces;


/**
 * Interface SluggerInterface
 * @package App\Services\Interfaces
 */
interface SluggerInterface
{
    /**
     * @param string $string
     * @return mixed
     */
    public function createSlug(string $string): string;
}