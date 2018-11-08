<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/11/2018
 * Time: 09:46
 */

namespace App\Services\Transformers;


use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\HttpFoundation\File\File;

class ImageDefaultTransformer implements DataTransformerInterface
{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }


    public function transform($value)
    {
        $file = new File($this->path.$value);
        return $file;
    }

    public function reverseTransform($value)
    {

    }
}