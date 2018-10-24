<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 16:56
 */

namespace App\UI\Responder\Interfaces;

use Twig\Environment;
use Symfony\Component\Form\FormInterface;


/**
 * Interface EditTrickActionResponderInterface
 * @package App\UI\Responder\Interfaces
 */
interface EditTrickActionResponderInterface
{
    /**
     * EditTrickActionResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param bool $redirect
     * @param FormInterface $form
     * @return mixed
     */
    public function __invoke(FormInterface $form, $redirect = false);

}