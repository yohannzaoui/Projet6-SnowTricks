<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 07:50
 */

namespace App\Domain\DTO\DTOFactory;


use App\Domain\DTO\DTOFactory\Interfaces\DefaultImageDTOFactoryInterface;
use App\Domain\DTO\NewDefaultImageDTO;
use App\Domain\Models\Image;

class DefaultImageDTOFactory implements DefaultImageDTOFactoryInterface
{
    public function create(Image $image)
    {
        return new NewDefaultImageDTO($image->getImage());
    }
}