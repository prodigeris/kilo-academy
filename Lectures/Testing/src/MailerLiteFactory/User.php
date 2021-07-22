<?php

declare(strict_types=1);

namespace Kilo\MailerLiteFactory;


class User
{
    private string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
