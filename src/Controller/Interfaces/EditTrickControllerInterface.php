<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 21/11/2018
 * Time: 11:50
 */

namespace App\Controller\Interfaces;

use App\FormHandler\Interfaces\EditTrickHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Trick;

/**
 * Interface EditTrickControllerInterface
 * @package App\Controller\Interfaces
 */
interface EditTrickControllerInterface
{
    /**
     * EditTrickControllerInterface constructor.
     * @param EditTrickHandlerInterface $editTrickHandler
     */
    public function __construct(
        EditTrickHandlerInterface $editTrickHandler
    );

    /**
     * @param Request $request
     * @param Trick $trick
     * @return mixed
     */
    public function index(Request $request , Trick $trick);
}