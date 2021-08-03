<?php

declare(strict_types=1);

class UserCreatedEmailListener
{
    private EmailSender $sendEmail;

    public function __construct(EmailSender $sendEmail)
    {
        $this->sendEmail = $sendEmail;
    }

    public function handle(UserCreated $event): void
    {
        $this->sendEmail->send(new UserCreatedEmail(...));
    }
}
