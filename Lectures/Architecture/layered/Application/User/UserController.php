<?php

declare(strict_types=1);

use http\Env\Request;
use Psr\Log\LoggerInterface;

class UserController
{
    private UserRegistrationService $registrationService;
    private LoggerInterface $logger;

    public function __construct(UserRegistrationService $registrationService, LoggerInterface $logger)
    {
        $this->registrationService = $registrationService;
        $this->logger = $logger;
    }

    public function store(Request $request)
    {
        $user = $this->registrationService->register($request->username, $request->password);

        $this->logger->info('USER_CREATED');

        return $this->view('user_create.blade.php', ['user' => new UserViewModel($user)]);
    }
}
