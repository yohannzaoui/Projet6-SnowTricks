<?php

namespace App\Domain\DTO;

class NewCommentDTO
{


    public $pseudo;
    

    public $message;


    public function __construct($id, $pseudo, $message, $createdAt, $trick)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
    }

    
}