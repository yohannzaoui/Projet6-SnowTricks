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
    public $video;

    public function __construct($video)
    {
        $this->video = $video;
    }

}