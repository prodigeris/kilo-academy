<?php

declare(strict_types=1);

namespace Kilo\MailerLiteFactory;


class MailerLite
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function sendEmail(string $to): void
    {
        // does lots of stuff
    }
}
