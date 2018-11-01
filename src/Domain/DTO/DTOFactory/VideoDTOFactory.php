<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 16:30
 */

namespace App\Domain\DTO\DTOFactory;


use App\Domain\DTO\NewImageDTO;
use App\Domain\Models\Interfaces\ImageInterface;

class VideoDTOFactory
{
    public function createDefaultImage(ImageInterface $image)
    {
        return new NewImageDTO();
    }
}