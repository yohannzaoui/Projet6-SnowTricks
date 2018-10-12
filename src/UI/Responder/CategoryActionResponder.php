<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;


/**
 * Class CategoryActionResponder
 * @package App\UI\Responder
 */
class CategoryActionResponder implements CategoryActionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * CategoryActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param bool $redirect
     * @param FormInterface $form
     * @param $categoryList
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, FormInterface $form, $categoryList)
    {
        $redirect
        ? $response = new Response($this->twig->render('admin/category.html.twig', [
            'form' => $form->createView(),
            'categoryslist' => $categoryList
        ]), 200)
        : $response = new Response($this->twig->render('admin/category.html.twig', [
            'form' => $form->createView(),
            'categoryslist' => $categoryList
        ]), 200);
        return $response;
    }
}