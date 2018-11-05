<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/11/2018
 * Time: 07:50
 */

namespace App\Domain\DTO\DTOFactory\Interfaces;

use App\Domain\Models\Video;

interface VideoDTOFactoryInterface
{
    public function create($video);
}