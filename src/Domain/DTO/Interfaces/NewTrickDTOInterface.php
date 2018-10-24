<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:31
 */

namespace App\Domain\DTO\Interfaces;


use App\Domain\DTO\NewImageDTO;
use App\Domain\DTO\NewVideoDTO;

/**
 * Interface NewTrickDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewTrickDTOInterface
{

    public function __construct(
        $name = null,
        $description = null,
        NewImageDTO $image = null,
        NewVideoDTO $video = null,
        $category = null
    );
}