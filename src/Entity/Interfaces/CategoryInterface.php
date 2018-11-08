<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 08:28
 */

namespace App\Entity\Interfaces;



interface CategoryInterface
{
    /**
     * CategoryInterface constructor.
     */
    public function __construct();

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getName();
}