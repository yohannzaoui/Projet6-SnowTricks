<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 12/10/2018
 * Time: 22:07
 */

namespace App\Domain\Builder;

use App\Domain\Models\Media;

/**
 * Class MediaBuilder
 * @package App\Domain\Builder
 */
class MediaBuilder
{
    /**
     * @var
     */
    private $Media;

    /**
     * @param $fileName
     * @return $this
     * @throws \Exception
     */
    public function create($fileName)
    {
        $this->Media = new Media($fileName);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMedia()
    {
        return $this->Media;
    }
}