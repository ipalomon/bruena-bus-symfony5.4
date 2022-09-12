<?php

namespace App\Domain\RegisterUser\Command;

use App\Domain\RegisterUser\Command\Command\RegisterUser;
use App\Domain\RegisterUser\Command\CommandBus\CommandBusInterface;
use App\Domain\RegisterUser\Command\CommandHandler\RegisterUserHandler;

class CommandHandler implements CommandBusInterface
{

    public function subscribe(string $commandClassName, string $handlerClassName)
    {
        $user = $commandClassName->getUser();
        $passwd = $commandClassName->getPassword();

        $handlerClassName->handle($user, $passwd);
    }

    public function dispatch(RegisterUser $command): RegisterUser
    {

        return new RegisterUser($command->username, $command->password);

    }


}