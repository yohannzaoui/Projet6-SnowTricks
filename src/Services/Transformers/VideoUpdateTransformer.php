<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/11/2018
 * Time: 13:49
 */

namespace App\Services\Transformers;


use Symfony\Component\Form\DataTransformerInterface;

class VideoUpdateTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
       $result =  implode(',', $value);

       return $result;
    }

    public function reverseTransform($value)
    {
        // TODO: Implement reverseTransform() method.
    }
}