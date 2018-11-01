<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 09:43
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewVideoDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewVideoDTOInterface
{
    /**
     * NewVideoDTOInterface constructor.
     * @param array $urls
     */
    public function __construct(array $urls = []);

    /**
     * @return mixed
     */
    public function getUrl();
}