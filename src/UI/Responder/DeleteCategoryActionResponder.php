<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 15/10/2018
 * Time: 12:58
 */

namespace App\UI\Responder;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use App\UI\Responder\Interfaces\DeleteCategoryActionResponderInterface;

/**
 * Class DeleteCategoryActionResponder
 * @package App\UI\Responder
 */
class DeleteCategoryActionResponder implements DeleteCategoryActionResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * DeleteCategoryActionResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $category
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke()
    {
        $response = new RedirectResponse('/admin');
        return $response;
    }
}