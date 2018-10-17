<?php


namespace App\Domain\Builder;

use App\Domain\Builder\Interfaces\CommentBuilderInterface;
use App\Domain\Models\Comment;


/**
 * Class CommentBuilder
 * @package App\Domain\Builder
 */
class CommentBuilder implements CommentBuilderInterface
{
    /**
     * @var
     */
    private $comment;


    /**
     * @param $pseudo
     * @param $message
     * @param $trick
     * @return $this
     * @throws \Exception
     */
    public function createFromComment($pseudo, $message, $trick)
    {
        $this->comment = new Comment($pseudo, $message, $trick);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

}