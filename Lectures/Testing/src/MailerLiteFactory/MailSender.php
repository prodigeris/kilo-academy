<?php

declare(strict_types=1);

namespace Kilo\MailerLiteFactory;


class MailSender
{
    private MailerLite $client;

    public function __construct(MailerLite $client)
    {
        $this->client = $client;
    }

    public function sendOrderConfirmation(User $user): void
    {
        $this->client->sendEmail(
            $user->getEmail(),
        );
    }
}
