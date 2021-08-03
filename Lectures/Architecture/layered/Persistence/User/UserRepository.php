<?php

declare(strict_types=1);

class UserRepository
{
    private EntityManagerInterface $entity;

    public function __construct(EntityManagerInterface $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @throws UserNotFoundException
     */
    public function findById(int $id): User
    {
        $user = User::find($id);
        if(!$user) {
            throw new UserNotFoundException();
        }
        return $user;
    }
}
