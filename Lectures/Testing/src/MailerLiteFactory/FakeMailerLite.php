<?php

declare(strict_types=1);

namespace Kilo\MailerLiteFactory;


class FakeMailerLite extends MailerLite
{
    public function __construct(string $apiKey = '')
    {
        parent::__construct($apiKey);
    }

    public function sendEmail(string $to): void
    {
    }
}
