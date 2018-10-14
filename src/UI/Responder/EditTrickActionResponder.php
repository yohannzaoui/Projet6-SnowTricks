<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 16:56
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\EditTrickActionResponderInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class EditTrickActionResponder
 * @package App\UI\Responder
 */
class EditTrickActionResponder implements EditTrickActionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * EditTrickActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }


    /**
     * @param bool $redirect
     * @param FormInterface $form
     * @return RedirectResponse|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($trick, FormInterface $form, $redirect = false)
    {
        $redirect
            ? $response = New Response($this->twig->render('add_trick/index.html.twig', [
            'form' => $form->createView(),
            'trick' => $trick
        ]), 200)
            : $response = new RedirectResponse('/');
        return $response;

    }
}