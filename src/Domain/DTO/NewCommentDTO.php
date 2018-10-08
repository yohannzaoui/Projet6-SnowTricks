<?php

namespace App\Domain\DTO;

class NewCommentDTO
{
    public $pseudo;
    

    public $message;
    

    public $createdAt;
    

	public $trick;

    public function __construct($pseudo, $message, $createdAt, $trick)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
        $this->createdAt = $createdAt;
        $this->trick = $trick;
    }

    
}