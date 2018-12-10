<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 17:40
 */

namespace App\Event\Interfaces;

/**
 * Interface FileRemoverEventInterface
 * @package App\Event\Interfaces
 */
interface FileRemoverEventInterface
{
    /**
     * FileRemoverEventInterface constructor.
     * @param string $file
     */
    public function __construct(
        string $file
    );

    /**
     * @return mixed
     */
    public function removeFile();
}