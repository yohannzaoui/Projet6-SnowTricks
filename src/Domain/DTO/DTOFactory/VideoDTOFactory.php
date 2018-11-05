<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 01/11/2018
 * Time: 16:30
 */

namespace App\Domain\DTO\DTOFactory;



use App\Domain\DTO\DTOFactory\Interfaces\VideoDTOFactoryInterface;
use App\Domain\DTO\NewVideoDTO;
use App\Domain\Models\Video;

class VideoDTOFactory implements VideoDTOFactoryInterface
{
    public function create($video)
    {
        return new NewVideoDTO($video);
    }
}