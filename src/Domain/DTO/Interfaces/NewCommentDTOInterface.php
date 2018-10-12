<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:33
 */

namespace App\Domain\DTO\Interfaces;


/**
 * Interface NewCommentDTOInterface
 * @package App\Domain\DTO\Interfaces
 */
interface NewCommentDTOInterface
{
    /**
     * NewCommentDTOInterface constructor.
     * @param null $pseudo
     * @param null $message
     */
    public function __construct($pseudo = null, $message = null);
}