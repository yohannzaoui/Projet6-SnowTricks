<?php


namespace App\UI\Action;


use App\Domain\Builder\UserBuilder;
use App\Domain\Models\User;
use App\UI\Form\RegisterType;
use App\Mailer\Interfaces\EmailerInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Action\Interfaces\RegisterActionInterface;
use App\UI\Form\Handler\Interfaces\RegisterTypeHandlerInterface;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class RegisterAction implements RegisterActionInterface
{

    private $formFactory;
    //private $registerTypeHandler;
    private $encoderFactory;
    private $userBuilder;

    /**
     * 
     */
    public function __construct(FormFactoryInterface $formFactory,
        /*RegisterTypeHandlerInterface $registerTypeHandler,*/
        EncoderFactoryInterface $encoderFactory, UserBuilder $userBuilder
    ) {
        $this->formFactory = $formFactory;
        //$this->registerTypeHandler = $registerTypeHandler;
        $this->encoderFactory = $encoderFactory;
        $this->userBuilder = $userBuilder;
    }
    
    /**
     * @Route("/inscription", name="register", methods={"GET","POST"})
     */
    public function __invoke(Request $request, EmailerInterface $mail, \Swift_Mailer $mailer, RegisterActionResponderInterface $responder, ObjectManager $manager)
    {
        $form = $this->formFactory->create(RegisterType::class)
                                  ->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formData = $form->getData();
            $encoder = $this->encoderFactory->getEncoder(User::class);
            $token = md5(str_rot13(crypt('abcdefghijklmnopqrstwxyz1234567890', null)));
            $user = $this->userBuilder->createFromRegistration($formData->username, $formData->email, $formData->password, \closure::fromCallable([$encoder, 'encodePassword']), $token);
            $getEmail = $formData->email;
            $email = $mail->mail('Validation de votre compte Snow Tricks',
                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                $getEmail,
                "Veuillez confirmez votre compte en cliquant sur ce lien\n\n http://st/confirmeregister/$token");
            $mailer->send($email);
            $manager->persist($user);
            $manager->flush();
            return $responder(true, $form, $getEmail);
        }
        return $responder(false, $form);


        
        /*if ($this->registerTypeHandler->handle($form, $user, $token, $encoder)) {


        }*/

    }
}