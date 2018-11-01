<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 22:44
 */

namespace App\Domain\DTO\DTOFactory\Interfaces;

use App\Domain\Models\Trick;

interface TrickDTOFactoryInterface
{
    public function create(Trick $trick);
}