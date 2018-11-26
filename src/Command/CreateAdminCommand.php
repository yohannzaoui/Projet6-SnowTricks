<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 18/11/2018
 * Time: 12:31
 */

namespace App\Command;

use App\Command\Interfaces\CreateAdminCommandInterface;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class CreateAdminCommand
 * @package App\Command
 */
class CreateAdminCommand extends Command implements CreateAdminCommandInterface
{

    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var User
     */
    private $user;

    /**
     * @var bool
     */
    private $username;

    /**
     * @var bool
     */
    private $password;

    /**
     * @var bool
     */
    private $email;


    /**
     * CreateAdminCommand constructor.
     * @param EncoderFactoryInterface $encoderFactory
     * @param UserRepository $userRepository
     * @param bool $username
     * @param bool $password
     * @param bool $email
     * @throws \Exception
     */
    public function __construct(
        EncoderFactoryInterface $encoderFactory,
        UserRepository $userRepository,
        $username = true,
        $password = true,
        $email = true
    ) {
        parent::__construct();
        $this->encoderFactory = $encoderFactory;
        $this->userRepository = $userRepository;
        $this->user = new User();
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }


    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('app:create-admin')
            ->setDescription('Create admin account')
            ->setHelp("Cette commande vous assiste pour la création d'un compte administrateur")
            ->addArgument('username', InputArgument::REQUIRED, 'Username of the admin')
            ->addArgument('password', InputArgument::REQUIRED, 'password admin')
            ->addArgument('email', InputArgument::REQUIRED, 'Email admin')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('You are about to create an admin-user.');
        $output->writeln('Username: ' .$input->getArgument('username'));
        $output->writeln('Password: ' .$input->getArgument('password'));
        $output->writeln('Email: ' .$input->getArgument('email'));
        $output->writeln('Role: ROLE_ADMIN');

        $passwordEncode = $this->encoderFactory->getEncoder(User::class)
            ->encodePassword($input->getArgument('password'), null);

        $this->user->setUsername($input->getArgument('username'));
        $this->user->setPassword($passwordEncode);
        $this->user->setEmail($input->getArgument('email'));
        $this->user->setRoles(['ROLE_ADMIN']);

        $this->userRepository->save($this->user);

        $output->writeln('Admin successfully created');
    }
}