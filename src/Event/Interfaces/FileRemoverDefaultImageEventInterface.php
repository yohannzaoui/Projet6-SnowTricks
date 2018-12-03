<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 02/12/2018
 * Time: 17:40
 */

namespace App\Event\Interfaces;

use App\Services\FileRemover;

/**
 * Interface FileRemoverDefaultImageEventInterface
 * @package App\Event\Interfaces
 */
interface FileRemoverDefaultImageEventInterface
{
    /**
     * FileRemoverDefaultImageEventInterface constructor.
     * @param FileRemover $fileRemover
     * @param string $file
     */
    public function __construct(
        FileRemover $fileRemover,
        string $file
    );

    /**
     * @return mixed
     */
    public function removeFile();
}