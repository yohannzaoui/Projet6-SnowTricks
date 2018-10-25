<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 10/10/2018
 * Time: 21:22
 */

namespace App\UI\Action;

use App\UI\Action\Interfaces\RegisterActionInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Form\RegisterType;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Register
 * @package App\UI\Action
 */
class RegisterAction implements RegisterActionInterface
{
    /**
     * @var RegisterTypeHandlerInterface
     */
    private $registerTypeHandler;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;


    /**
     * RegisterAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param RegisterTypeHandlerInterface $registerTypeHandler
     */
    public function __construct(FormFactoryInterface $formFactory, RegisterTypeHandlerInterface $registerTypeHandler)
    {
        $this->formFactory = $formFactory;
        $this->registerTypeHandler = $registerTypeHandler;
    }


    /**
     * @Route("/inscription", name="register", methods={"GET","POST"})
     * @param Request $request
     * @param RegisterActionResponderInterface $responder
     * @return mixed
     */
    public function __invoke(Request $request, RegisterActionResponderInterface $responder)
    {
        $form = $this->formFactory->create(RegisterType::class)->handleRequest($request);

        if ($this->registerTypeHandler->handle($form)) {

            return $responder(true, $form);
        }
        return $responder(false,$form);

    }
}