<?php

namespace App\Controller;

use App\Domain\RegisterUser\Command\Command\RegisterUser;
use App\Domain\RegisterUser\Command\CommandHandler;
use App\Domain\RegisterUser\Command\CommandHandler\RegisterUserHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController  extends AbstractController
{
    private CommandHandler $bus;

    public function __construct(CommandHandler $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @Route("/user", name="new-user")
     */
    public function register(Request $request): JsonResponse
    {

        $parameters = json_decode($request->getContent(), true);
        $username = $parameters["username"];
        $password = $parameters["password"];

        //$command = new RegisterUser($request->request->get('username'), $request->request->get('password'));
        $command = new RegisterUser($username, $password);


        $this->bus->subscribe(RegisterUser::class, RegisterUserHandler::class);

        $this->bus->dispatch($command);

        return $this->json(['user' => $command]);
    }
}