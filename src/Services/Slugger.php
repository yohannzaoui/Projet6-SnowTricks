<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 27/11/2018
 * Time: 12:42
 */

namespace App\Services;


use App\Services\Interfaces\SluggerInterface;

/**
 * Class Slugger
 * @package App\Services
 */
class Slugger implements SluggerInterface
{
    /**
     * @param string $string
     * @return mixed|string
     */
    public function createSlug(string $string): string
    {
         return strtolower(str_replace(' ', '-', $string));
    }
}