<?php

declare(strict_types=1);

class UserViewModel
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function printName(): string
    {
        return sprintf('%s - %s',
            $this->user->getFirstName(),
            $this->user->getLastName()
        );
    }
}
