<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:11
 */

namespace App\Controller\Interfaces;

use App\Repository\TrickRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface TrickControllerInterface
 * @package App\Controller\Interfaces
 */
interface TrickControllerInterface
{
    /**
     * TrickControllerInterface constructor.
     * @param TrickRepository $trickRepository
     * @param ObjectManager $manager
     */
    public function __construct(
        TrickRepository $trickRepository,
        ObjectManager $manager
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}