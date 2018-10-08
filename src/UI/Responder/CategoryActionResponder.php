<?php

namespace App\UI\Responder;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use App\UI\Responder\Interfaces\CategoryActionResponderInterface;


class CategoryActionResponder implements CategoryActionResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($redirect = false, FormInterface $form, $categoryList)
    {
        $redirect
        ? $response = new Response($this->twig->render('category/index.html.twig', [
            'form' => $form->createView(),
            'categoryslist' => $categoryList
        ]), 200)
        : $response = new Response($this->twig->render('category/index.html.twig', [
            'form' => $form->createView(),
            'categoryslist' => $categoryList
        ]), 200);
        return $response;
    }
}