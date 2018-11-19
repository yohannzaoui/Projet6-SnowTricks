<?php
/**
 * Created by PhpStorm.
 * User: Yohann Zaoui
 * Date: 18/11/2018
 * Time: 12:31
 */

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class CreateAdminCommand
 * @package App\Command
 */
class CreateAdminCommand extends Command
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoder;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @var
     */
    private $email;


    /**
     * CreateAdminCommand constructor.
     * @param UserRepository $userRepository
     * @param EncoderFactoryInterface $encoder
     * @param $username
     * @param $password
     * @param $email
     */
    public function __construct(
        UserRepository $userRepository,
        EncoderFactoryInterface $encoder
    ) {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;
    }

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('app:create-admin')
            ->setDescription('Create user admin')
            ->setHelp('This command allows you to create a user admin')
            ->addArgument('username',$this->username, InputArgument::REQUIRED, '')
            ->addArgument('password',$this->password, InputArgument::REQUIRED,'')
            ->addArgument('email', $this->email, InputArgument::REQUIRED, '');

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
        $output->writeln([
            'Admin Creator',
            '=============',
            ''
        ]);
        $output->writeln('You are about to create an admin-user.');
        $output->writeln('Username: ' .$input->getArgument('username'));
        $output->writeln('Password: ' .$input->getArgument('password'));
        $output->writeln('Email: ' .$input->getArgument('email'));
        $output->writeln('Role: ROLE_ADMIN');
        $password = $this->encoder->getEncoder(User::class)
            ->encodePassword($input->getArgument('password'), null);

        $user = new User();

        $user->setUsername($input->getArgument('username'));
        $user->setPassword($password);
        $user->setEmail($input->getArgument('email'));
        $user->setRoles(['ROLE_ADMIN']);

        $this->userRepository->save($user);

        $output->writeln('Admin successfully created');
    }
}