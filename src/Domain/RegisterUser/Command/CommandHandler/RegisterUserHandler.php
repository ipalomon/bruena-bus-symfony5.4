<?php

namespace App\Domain\RegisterUser\Command\CommandHandler;



use App\Domain\RegisterUser\Command\CommandBus\CommandBusInterface;
use App\Entity\Users;
use App\Repository\UsersRepository;

final class RegisterUserHandler implements CommandBusInterface
{

    private UsersRepository $repository;

    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($command)
    {
        $user = new Users();

        $user->setUsername($command->username);
        $user->setPassword($command->password);

        $this->repository->add($user, true);
    }
}