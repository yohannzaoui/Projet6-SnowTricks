<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 10:01
 */

namespace App\Entity\Interfaces;



interface VideoInterface
{
    /**
     * VideoInterface constructor.
     * @param null $url
     */
    public function __construct($url = null);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getUrl();
}