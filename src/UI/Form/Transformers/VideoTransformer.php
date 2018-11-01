<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 26/10/2018
 * Time: 16:25
 */

namespace App\UI\Form\Transformers;


use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class VideoTransformer
 * @package App\UI\Form\Transformers
 */
class VideoTransformer implements DataTransformerInterface
{
    /**
     * @param mixed $value
     * @return mixed|void
     */
    public function transform($value)
    {

    }

    /**
     * @param mixed $value
     * @return array|mixed
     */
    public function reverseTransform($value)
    {
        if (strlen($value) === 0) {
            return [];
        }

        return explode(',', $value);
    }
}