<?php

declare(strict_types=1);

class DeleteUser
{
    public function execute(User $user): void
    {
        $user->delete();

        new UserDeleted();
    }
}
