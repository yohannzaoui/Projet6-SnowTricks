<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 15:58
 */

namespace App\UI\Form\Handler\Interfaces;

use App\Domain\Repository\TrickRepository;
use App\Domain\Builder\TrickBuilder;
use Symfony\Component\Form\FormInterface;


interface EditTrickTypeHandlerInterface
{
    public function __construct(TrickRepository $trickRepository, TrickBuilder $trickBuilder);

    public function handle(FormInterface $form);
}