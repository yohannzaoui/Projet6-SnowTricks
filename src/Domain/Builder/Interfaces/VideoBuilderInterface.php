<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 23/10/2018
 * Time: 18:10
 */

namespace App\Domain\Builder\Interfaces;


/**
 * Interface VideoBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface VideoBuilderInterface
{

    /**
     * @return mixed
     */
    public function getVideos();

    /**
     * @param array $urls
     * @return mixed
     */
    public function createFromArray(array $urls);
}