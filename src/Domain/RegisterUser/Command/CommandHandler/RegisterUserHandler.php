<?php

namespace App\Domain\RegisterUser\Command\CommandHandler;

use App\Domain\RegisterUser\Command\Command\RegisterUser;
use App\Entity\Users;
use App\Repository\UsersRepository;

final class RegisterUserHandler
{

    private UsersRepository $repository;
    private Users $user;

    public function __construct(UsersRepository $repository,  Users $user)
    {
        $this->repository = $repository;
        $this->user = $user;
    }

    public static function handle($username, $password)
    {
        $command = new RegisterUser($username, $password);
echo "pasa";
     /*   $this->user->setUsername($command->username);
        $this->user->setPassword($command->password);

        $this->repository->add($this->user);*/
    }
}