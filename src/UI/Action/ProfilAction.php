<?php

namespace App\UI\Action;

use App\UI\Responder\Interfaces\ProfilActionResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Form\Handler\Interfaces\ProfilTypeHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Form\ProfilType;


class ProfilAction
{

    private $formFactory;
    private $profilTypeHandler;
    private $container;


    public function __construct(FormFactoryInterface $formFactory,
        ProfilTypeHandlerInterface $profilTypeHandler,
        ContainerInterface $container
    ) {
        $this->formFactory = $formFactory;
        $this->profilTypeHandler = $profilTypeHandler;
        $this->container = $container;
    }
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/monprofil", name="profil", methods={"GET","POST"})
     */
    public function __invoke(Request $request, ProfilActionResponderInterface $responder)
    {
        $form = $this->formFactory->create(ProfilType::class)->handleRequest($request);

        $security = $this->container->get('security.token_storage');

        $token = $security->getToken();

        $userId = $token->getUser();

        $userId->getId();

        if ($this->profilTypeHandler->handle($form)){
            return $responder(true, $form);
        }
        return $responder(false, $form);

    }
}