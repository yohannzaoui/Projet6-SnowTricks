<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 14/10/2018
 * Time: 16:19
 */

namespace App\UI\Form\Handler;

use App\Domain\Builder\TrickBuilder;
use App\Domain\Repository\TrickRepository;
use App\UI\Form\Handler\Interfaces\EditTrickTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class EditTrickTypeHandler
 * @package App\UI\Form\Handler
 */
class EditTrickTypeHandler implements EditTrickTypeHandlerInterface
{
    /**
     * @var TrickRepository
     */
    private $trickRepository;
    /**
     * @var TrickBuilder
     */
    private $trickBuilder;

    /**
     * EditTrickTypeHandler constructor.
     * @param TrickRepository $trickRepository
     * @param TrickBuilder $trickBuilder
     */
    public function __construct(TrickRepository $trickRepository, TrickBuilder $trickBuilder)
    {
        $this->trickRepository = $trickRepository;
        $this->trickBuilder = $trickBuilder;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Exception
     */
    public function handle(FormInterface $form)
    {
       if ($form->isSubmitted() && $form->isValid()){

           $this->trickBuilder->create($form->getData()->name, $form->getData()->description, $form->getData()->image, $form->getData()->video);

           $this->trickRepository->update();

           return true;
       }
       return false;
    }
}