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

    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function transform($value)
    {
        $file = new File($this->path.$value);
        $fileName = $file->getFilename();
        return $fileName;
    }

    /**
     * @param mixed $value
     * @return mixed|void
     */
    public function reverseTransform($value)
    {

    }
}