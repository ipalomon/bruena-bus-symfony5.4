<?php

namespace App\Domain\RegisterUser\Command\CommandBus;

use App\Domain\RegisterUser\Command\Command\RegisterUser;

interface CommandBusInterface
{
    public function subscribe(string $commandClassName, string $handlerClassName);

    public function dispatch(RegisterUser $command);
}