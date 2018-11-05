<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/11/2018
 * Time: 15:28
 */

namespace App\UI\Form\Transformers;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\DataTransformerInterface;

class ImageTransformer implements DataTransformerInterface
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function transform($value)
    {
        dd($value);
        $file = new File($this->path.$data);
        $fileName = $file->getFilename();
        return $fileName;
    }

    public function reverseTransform($value)
    {

    }
}