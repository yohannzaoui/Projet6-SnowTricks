<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 03/11/2018
 * Time: 15:28
 */

namespace App\Form\Transformers;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class ImageTransformer
 * @package App\Form\Transformers
 */
class ImageTransformer implements DataTransformerInterface
{
    /**
     * @var
     */
    private $path;

    /**
     * ImageTransformer constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }


    public function transform($value)
    {

    }

    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function reverseTransform($value)
    {
        $file = new File($this->path.$value);
        $fileName = $file->getFilename();
        return $fileName;
    }
}