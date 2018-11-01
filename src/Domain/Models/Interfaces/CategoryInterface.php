<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 31/10/2018
 * Time: 08:28
 */

namespace App\Domain\Models\Interfaces;


/**
 * Interface CategoryInterface
 * @package App\Domain\Models\Interfaces
 */
interface CategoryInterface
{
    /**
     * CategoryInterface constructor.
     * @param $name
     */
    public function __construct($name);

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getName();
}