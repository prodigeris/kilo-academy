<?php

declare(strict_types=1);

class CreateUser
{
    public function execute(): void
    {
        $user = new User();
        $user->save();

        new UserCreated();
    }
}
