<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 22:45
 */

namespace App\Domain\Builder;


use App\Domain\Builder\Interfaces\VideoBuilderInterface;
use App\Domain\Models\Video;

/**
 * Class VideoBuilder
 * @package App\Domain\Builder
 */
class VideoBuilder implements VideoBuilderInterface
{
    /**
     * @var
     */
    private $video;

    /**
     * @param $url
     * @return $this
     * @throws \Exception
     */
    public function create($url)
    {
      $this->video = new Video($url);
      return $this;
    }

    /**
     * @return mixed
     */
    public function getVideo()
    {
        return $this->video;
    }
}