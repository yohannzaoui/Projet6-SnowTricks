<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 04/11/2018
 * Time: 13:49
 */

namespace App\Form\Transformers;


use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class VideoUpdateTransformer
 * @package App\Form\Transformers
 */
class VideoUpdateTransformer implements DataTransformerInterface
{
    /**
     * @param mixed $value
     * @return mixed|string
     */
    public function transform($value)
    {
       $result =  implode(',', $value);

       return $result;
    }

    /**
     * @param mixed $value
     * @return mixed|void
     */
    public function reverseTransform($value)
    {
        // TODO: Implement reverseTransform() method.
    }
}