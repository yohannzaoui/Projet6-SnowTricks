<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:07
 */

namespace App\Domain\Builder;


use App\Domain\Models\Media;

class MediaBuilder
{
    private $Media;

    public function createFromProfil($path, $fileName, $file)
    {
        $this->Media = new Media($path, $fileName, $file);
        return $this;
    }

    public function getMedia()
    {
        return $this->Media;
    }
}