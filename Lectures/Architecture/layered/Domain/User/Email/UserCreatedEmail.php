<?php

declare(strict_types=1);

class UserCreatedEmail
{
    private string $email;
    private string $name;

    public function __construct(string $email, string $name)
    {

        $this->email = $email;
        $this->name = $name;
    }
}
