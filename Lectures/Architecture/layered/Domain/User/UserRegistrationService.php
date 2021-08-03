<?php

declare(strict_types=1);

class UserRegistrationService
{
    private \Composer\EventDispatcher\EventDispatcher $dispatcher;

    public function __construct(\Composer\EventDispatcher\EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function register(string $username, string $password): User
    {
        event(new UserCreated());

        return new User();
    }
}
