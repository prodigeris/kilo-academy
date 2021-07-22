<?php

declare(strict_types=1);

namespace Tests\MailerLiteFactory;

use Kilo\MailerLiteFactory\EnvAsserter;
use Kilo\MailerLiteFactory\FakeMailerLite;
use Kilo\MailerLiteFactory\MailerLite;
use Kilo\MailerLiteFactory\MailerLiteFactory;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Prophecy\Prophecy\ObjectProphecy;
use TypeError;

class MailerLiteFactoryTest extends TestCase
{
    use ProphecyTrait;

    private const API_KEY = 'abc';

    private ObjectProphecy|EnvAsserter $envAsserter;

    protected function setUp(): void
    {
        $this->envAsserter = $this->prophesize(EnvAsserter::class);
    }


    public function test_builds_fake_mailerlite_when_env_is_local_and_key_is_null(): void
    {
        $this->envAsserter
            ->isLocal()
            ->willReturn(true);

        $result = $this->buildFactory(null)->build();

        self::assertInstanceOf(FakeMailerLite::class, $result);
    }

    public function test_returns_real_mailerlite_when_env_is_local_and_key_is_not_null(): void
    {
        $this->envAsserter
            ->isLocal()
            ->willReturn(true);

        $result = $this->buildFactory(self::API_KEY)
            ->build();

        self::assertInstanceOf(MailerLite::class, $result);
    }

    public function test_returns_real_mailerlite_when_env_is_not_local_and_key_is_not_null(): void
    {
        $this->envAsserter
            ->isLocal()
            ->willReturn(false);

        $result = $this->buildFactory(self::API_KEY)->build();

        self::assertInstanceOf(MailerLite::class, $result);
    }

    public function test_throws_type_error_when_env_is_not_local_and_key_is_null(): void
    {
        // then
        $this->expectException(TypeError::class);

        // given

        $this->envAsserter
            ->isLocal()
            ->willReturn(false);

        $factory = $this->buildFactory(null);

        // when
        $factory->build();
    }

    private function buildFactory(?string $apiKey): MailerLiteFactory
    {
        return new MailerLiteFactory(
            $this->envAsserter->reveal(),
            $apiKey,
        );
    }


}
