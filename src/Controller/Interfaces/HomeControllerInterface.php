<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:00
 */

namespace App\Controller\Interfaces;

use App\Repository\TrickRepository;

/**
 * Interface HomeControllerInterface
 * @package App\Controller\Interfaces
 */
interface HomeControllerInterface
{
    /**
     * HomeControllerInterface constructor.
     * @param TrickRepository $trickRepository
     */
    public function __construct(TrickRepository $trickRepository);

    /**
     * @return mixed
     */
    public function index();
}