<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 11/10/2018
 * Time: 18:26
 */

namespace App\Domain\Builder\Interfaces;


/**
 * Interface CommentBuilderInterface
 * @package App\Domain\Builder\Interfaces
 */
interface CommentBuilderInterface
{
    /**
     * @param $pseudo
     * @param $message
     * @param $trick
     * @return mixed
     */
    public function createFromComment($pseudo, $message, $trick);

    /**
     * @return mixed
     */
    public function getComment();
}