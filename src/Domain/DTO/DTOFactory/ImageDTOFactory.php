<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 16:30
 */

namespace App\Domain\DTO\DTOFactory;


use App\Domain\DTO\DTOFactory\Interfaces\ImageDTOFactoryInterface;
use App\Domain\DTO\NewImageDTO;


class ImageDTOFactory implements ImageDTOFactoryInterface
{
    public function create($image)
    {
        return new NewImageDTO($image);
    }
}