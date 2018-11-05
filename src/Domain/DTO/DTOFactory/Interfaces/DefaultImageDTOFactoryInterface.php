<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 07:53
 */

namespace App\Domain\DTO\DTOFactory\Interfaces;

use App\Domain\Models\Image;

interface DefaultImageDTOFactoryInterface
{
    public function create(Image $image);
}