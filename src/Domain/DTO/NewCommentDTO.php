<?php

namespace App\Domain\DTO;

class NewCommentDTO
{

    /**
     * 
     */
    public $pseudo;

    /**
     * 
     */
    public $message;

    /**
     * 
     */
    public function __construct($pseudo = null, $message = null)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
    }

    
}