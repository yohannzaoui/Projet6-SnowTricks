<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:31
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\DTO\NewDefaultImageDTO;
use App\Domain\DTO\NewImageDTO;
use App\Domain\DTO\NewVideoDTO;


/**
 * Interface NewTrickDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewTrickDTOInterface
{

    public function __construct(
        $author,
        $name,
        $description,
        NewDefaultImageDTO $defaultImage,
        NewImageDTO $image,
        NewVideoDTO $video,
        $category
    );
}