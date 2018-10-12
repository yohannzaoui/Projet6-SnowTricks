<?php

namespace App\Domain\DTO;

/**
 * Class NewCommentDTO
 * @package App\Domain\DTO
 */
class NewCommentDTO
{


    /**
     * @var null
     */
    public $pseudo;


    /**
     * @var null
     */
    public $message;


    /**
     * NewCommentDTO constructor.
     * @param null $pseudo
     * @param null $message
     */
    public function __construct($pseudo = null, $message = null)
    {
        $this->pseudo = $pseudo;
        $this->message = $message;
    }

    
}