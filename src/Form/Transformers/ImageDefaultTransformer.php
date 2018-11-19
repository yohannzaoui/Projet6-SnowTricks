<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/11/2018
 * Time: 09:46
 */

namespace App\Form\Transformers;


use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class ImageDefaultTransformer
 * @package App\Form\Transformers
 */
class ImageDefaultTransformer implements DataTransformerInterface
{

    /**
     * @var
     */
    private $path;

    /**
     * ImageDefaultTransformer constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }


    /**
     * @param mixed $value
     * @return mixed|File
     */
    public function transform($value)
    {

    }


    public function reverseTransform($value)
    {

    }
}