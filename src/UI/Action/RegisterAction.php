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
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Class Register
 * @package App\UI\Action
 */
class RegisterAction implements RegisterActionInterface
{
    private $registerTypeHandler;
    private $formFactory;


    /**
     * Register constructor.
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory, RegisterTypeHandlerInterface $registerTypeHandler)
    {
        $this->formFactory = $formFactory;
        $this->registerTypeHandler = $registerTypeHandler;
    }

    /**
     * @Route("/inscription", name="register", methods={"GET","POST"})
     */
    public function __invoke(Request $request, RegisterActionResponderInterface $responder)
    {
        $form = $this->formFactory->create(RegisterType::class)->handleRequest($request);


        if ($this->registerTypeHandler->handle($form)) {

            $messageFlash = new Session;
            $messageFlash->getFlashBag()->add('register','Un email à l\'adresse ' .$form->getData()->email. ' vient de vous être envoyez pour la validation de votre compte');

            return $responder($form);
        }
        return $responder($form);



    }
}