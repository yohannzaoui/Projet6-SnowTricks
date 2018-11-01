<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 30/10/2018
 * Time: 21:34
 */

namespace App\Domain\Models\Interfaces;


/**
 * Interface ImageInterface
 * @package App\Domain\Models\Interfaces
 */
interface ImageInterface
{
    /**
     * ImageInterface constructor.
     * @param $fileName
     */
    public function __construct($fileName);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getImage();
}