<?php

declare(strict_types=1);

class Age
{
    private int $age;

    public function __construct(int $age)
    {
        if($age < 16) {
            throw new InvalidArgumentException();
        }
        $this->age = $age;
    }
}
