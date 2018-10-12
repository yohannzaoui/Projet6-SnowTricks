<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 10/10/2018
 * Time: 21:22
 */

namespace App\UI\Action;


use App\Domain\Builder\UserBuilder;
use App\Domain\Models\User;
use App\Mailer\Emailer;
use App\UI\Form\RegisterType;
use App\UI\Responder\Interfaces\RegisterActionResponderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Routing\Annotation\Route;

class Register
{
    private $encoderFactory;
    private $userBuilder;
    private $formFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory,
                                UserBuilder $userBuilder,
                                FormFactoryInterface $formFactory
    ) {
        $this->encoderFactory = $encoderFactory;
        $this->userBuilder = $userBuilder;
        $this->formFactory = $formFactory;
    }

    /**
     * @Route("/inscription", name="register", methods={"GET","POST"})
     */
    public function __invoke(Request $request, RegisterActionResponderInterface $responder, ObjectManager $manager, \Swift_Mailer $mailer, Emailer $mail)
    {
        $form = $this->formFactory->create(RegisterType::class)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

            $encoder = $this->encoderFactory->getEncoder(User::class, null);

            $token = md5(str_rot13(crypt('abcdefghijklmnopqrstwxyz1234567890', null)));

            $this->userBuilder->createFromRegistration(
                $data->username,
                $data->password,
                \closure::fromCallable([$encoder, 'encodePassword']),
                $data->email,
                $token
            );

            $email = $mail->mail('Validation de votre compte Snow Tricks',
                ['register@snowtrick.com' => 'Inscription à Snow Tricks'],
                $data->email,
                "Veuillez confirmez votre compte en cliquant sur ce lien\n\n http://st/confirmeregister/$token");

            $mailer->send($email);

            $user = $this->userBuilder->getUser();

            $manager->persist($user);
            $manager->flush();

            return $responder(true, $form, $data->email);
        }
        return $responder(false, $form);



    }
}