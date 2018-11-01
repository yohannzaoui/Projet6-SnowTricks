<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 20/10/2018
 * Time: 22:51
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewVideoDTOInterface;


/**
 * Class NewVideoDTO
 * @package App\Domain\DTO
 */
class NewVideoDTO implements NewVideoDTOInterface
{
    /**
     * @var
     */
    public $urls;

    /**
     * NewVideoDTO constructor.
     * @param $urls
     */
    public function __construct(array $urls = [])
    {
        $this->urls = $urls;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->urls;
    }



}