<?php

declare(strict_types=1);

namespace Tests\MailerLiteFactory;


use Kilo\MailerLiteFactory\MailerLite;
use Kilo\MailerLiteFactory\MailSender;
use Kilo\MailerLiteFactory\User;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;

class MailSenderTest extends TestCase
{
    use ProphecyTrait;

    private const EMAIL = 'iam@arn.as';

    private MailSender $sender;
    private ObjectProphecy|MailerLite $mailerlite;

    protected function setUp(): void
    {
        $this->mailerlite = $this->prophesize(MailerLite::class);
        $this->sender = new MailSender(
            $this->mailerlite->reveal(),
        );
    }

    public function test_order_confirmation_passes_users_email_to_mailerlite(): void
    {
        // given
        $user = new User(self::EMAIL);


        // when

        $this->sender->sendOrderConfirmation($user);

        // then

        $this->mailerlite->sendEmail(self::EMAIL)
            ->shouldBeCalledOnce();
    }

    public function test_order_confirmation_sends_email_using_mailerlite(): void
    {
        // given
        $user = new User(self::EMAIL);


        // when

        $this->sender->sendOrderConfirmation($user);

        // then

        $this->mailerlite->sendEmail(Argument::any())
            ->shouldBeCalledOnce();
    }

}
