<?php

declare(strict_types=1);

namespace Kilo\MailerLiteFactory;


class EnvAsserter
{
    public function isLocal(): bool
    {
        return false;
    }
}
