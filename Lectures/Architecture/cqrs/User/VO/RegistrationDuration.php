<?php

declare(strict_types=1);

class RegistrationDuration
{
    public function __construct(int $days)
    {
        if($days < 0) {
            throw new InvalidArgumentException();
        }

        if($days > 1000) {
            throw new InvalidArgumentException();
        }
    }
}
