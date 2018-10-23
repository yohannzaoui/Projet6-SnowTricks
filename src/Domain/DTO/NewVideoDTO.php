<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 22:51
 */

namespace App\Domain\DTO;


class NewVideoDTO
{
    public $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }



}