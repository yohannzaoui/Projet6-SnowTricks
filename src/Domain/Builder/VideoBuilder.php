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
    private $videos;


    /**
     * @param array $urls
     * @return array|mixed
     * @throws \Exception
     */
    function createFromArray(array $urls)
    {
        $videos = [];

        foreach ($urls as $url) {
            $videos[] = new Video($url);
        }
        return $videos;
    }

    /**
     * @return mixed
     */
    public function getVideos()
    {
        return $this->videos;
    }


}