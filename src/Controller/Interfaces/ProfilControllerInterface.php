<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:06
 */

namespace App\Controller\Interfaces;

use App\FormHandler\ProfilTypeHandler;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ProfilControllerInterface
 * @package App\Controller\Interfaces
 */
interface ProfilControllerInterface
{
    /**
     * ProfilControllerInterface constructor.
     * @param ProfilTypeHandler $profilTypeHandler
     */
    public function __construct(
        ProfilTypeHandler $profilTypeHandler
    );

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}