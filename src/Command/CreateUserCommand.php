<?php

namespace App\Command;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:create-user',
    description: 'Add a short description for your command',
)]
class CreateUserCommand extends Command
{
    private ManagerRegistry $managerRegistry;
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(
        ManagerRegistry $managerRegistry,
        UserPasswordHasherInterface $userPasswordHasher
    ) {
        parent::__construct();
        $this->managerRegistry = $managerRegistry;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('email', InputArgument::OPTIONAL, 'Email')
            ->addArgument('password', InputArgument::OPTIONAL, 'User Password')
            ->addArgument('role', InputArgument::OPTIONAL, 'User Role');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        try {
            $email = $input->getArgument('email');
            if (empty($email)) {
                $email = $io->ask('Enter email', null, function ($email) {
                    if (empty($email)) {
                        throw new InvalidArgumentException('Email cannot be blank');
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        throw new InvalidArgumentException('Email is not valid');
                    }

                    return $email;
                });
            }
            if (!is_string($email)) {
                throw new InvalidArgumentException('Email must be a string');
            }

            $password = $input->getArgument('password');
            if (empty($password)) {
                $password = $io->askHidden('Enter password', function ($password): string {
                    if (empty($password)) {
                        throw new InvalidArgumentException('Password cannot be blank');
                    }

                    return $password;
                });
            }
            if (!is_string($password)) {
                throw new InvalidArgumentException('Password must be a string');
            }

            $role = $input->getArgument('role');
            if (empty($role)) {
                $roles = [
                    'ROLE_ADMIN',
                    'ROLE_USER'
                ];

                $role = $io->choice('Choise role', $roles);
            }

            $em = $this->managerRegistry->getManager();

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($this->userPasswordHasher->hashPassword($user, $password));
            $user->setRoles([$role]);
            $user->setEnabled(true);
            $em->persist($user);

            $em->flush();

            $io->title('Created User Information');
            $io->listing([
                'Email: ' . $email,
                'Role: ' . $role,
            ]);
            $io->success('Created user successfully');

            return Command::SUCCESS;
        } catch (Exception $e) {
            $io->error($e->getMessage());

            return Command::FAILURE;
        }
    }
}
