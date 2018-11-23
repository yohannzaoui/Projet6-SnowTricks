<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 07/11/2018
 * Time: 17:09
 */

namespace App\Controller\Interfaces;

use App\FormHandler\RegisterFormHandler;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface RegisterControllerInterface
 * @package App\Controller\Interfaces
 */
interface RegisterControllerInterface
{
    /**
     * RegisterControllerInterface constructor.
     * @param RegisterFormHandler $registerFormHandler
     */
    public function __construct(RegisterFormHandler $registerFormHandler);

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request);
}