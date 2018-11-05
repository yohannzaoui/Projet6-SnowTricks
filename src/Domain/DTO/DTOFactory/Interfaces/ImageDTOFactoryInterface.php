<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 07:51
 */

namespace App\Domain\DTO\DTOFactory\Interfaces;

use App\Domain\Models\Image;

interface ImageDTOFactoryInterface
{
    public function create($image);
}