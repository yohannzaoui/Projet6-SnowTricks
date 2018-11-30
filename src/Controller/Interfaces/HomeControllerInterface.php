<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:00
 */

namespace App\Controller\Interfaces;

use App\Repository\TrickRepository;
use Twig\Environment;

/**
 * Interfaces HomeControllerInterface
 * @package App\Controller\Interfaces
 */
interface HomeControllerInterface
{
    /**
     * HomeControllerInterface constructor.
     * @param TrickRepository $trickRepository
     * @param Environment $twig
     */
    public function __construct(
        TrickRepository $trickRepository,
        Environment $twig
    );

    /**
     * @return mixed
     */
    public function index();
}