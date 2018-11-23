<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 30/10/2018
 * Time: 21:34
 */

namespace App\Entity\Interfaces;


interface ImageInterface
{
    /**
     * ImageInterface constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function getId();


    public function getFile();

    public function setFile($file);

}