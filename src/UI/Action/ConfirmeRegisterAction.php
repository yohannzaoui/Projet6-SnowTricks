<?php


namespace App\UI\Action;

use App\UI\Action\Interfaces\ConfirmeRegisterActionInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Responder\Interfaces\ConfirmeRegisterActionResponderInterface;

/**
 * Class ConfirmeRegisterAction
 * @package App\UI\Action
 */
class ConfirmeRegisterAction implements ConfirmeRegisterActionInterface
{
    /**
     * @Route("/confirmeregister/{token}", name="confirme", methods={"GET"})
     */
    public function __invoke(Request $request, ConfirmeRegisterActionResponderInterface $responder)
    {
        if ($request->get('token')) {
            return $responder(true);
        }
        return $responder(false);
    }
}