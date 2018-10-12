<?php


namespace App\Domain\Builder;

use App\Domain\Models\Comment;


class CommentBuilder
{
    private $comment;

    public function createFromComment($pseudo, $message, $trick)
    {
        $this->comment = new Comment($pseudo, $message, $trick);
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

}