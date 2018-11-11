<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 05/11/2018
 * Time: 13:48
 */

namespace App\FormHandler;


use App\Entity\User;
use App\Helper\Interfaces\RegisterMailInterface;
use App\Services\Interfaces\FileUploaderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class RegisterFormHandler
 * @package App\FormHandler
 */
class RegisterFormHandler
{

    /**
     * @var FileUploaderInterface
     */
    private $fileUploader;
    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var RegisterMailInterface
     */
    private $mail;
    /**
     * @var SessionInterface
     */
    private $messageFlash;


    /**
     * RegisterFormHandler constructor.
     * @param FileUploaderInterface $fileUploader
     * @param EncoderFactoryInterface $encoder
     * @param ObjectManager $manager
     * @param RegisterMailInterface $mail
     * @param SessionInterface $messageFlash
     */
    public function __construct(
        FileUploaderInterface $fileUploader,
        EncoderFactoryInterface $encoder,
        ObjectManager $manager,
        RegisterMailInterface $mail,
        SessionInterface $messageFlash
    ) {
        $this->fileUploader = $fileUploader;
        $this->encoder = $encoder;
        $this->manager = $manager;
        $this->mail = $mail;
        $this->messageFlash = $messageFlash;
    }

    /**
     * @param FormInterface $form
     * @return bool
     * @throws \Exception
     */
    public function handle(FormInterface $form)
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $user = new User();

            $file = $form->getData()
                ->getProfilImage();

            $fileName = $this->fileUploader->upload($file);

            $token = md5(uniqid());

            $user->setUsername($form->getData()
                ->getUsername()
            );
            $user->setPassword($this->encoder->getEncoder(
                User::class)->encodePassword(
                $form->getData()->getPassword(), null
            ));
            $user->setEmail($form->getData()->getEmail());
            $user->setToken($token);
            $user->setProfilImage($fileName);

            $this->manager->persist($user);
            $this->manager->flush();

            $this->mail->send($form->getData()->getEmail(), $token);

            $this->messageFlash->getFlashBag()->add('register',
                'Un email à l\'adresse ' .$form->getData()
                    ->getEmail(). ' vient de vous être envoyez pour la validation de votre compte');

            return true;
        }
        return false;
    }
}