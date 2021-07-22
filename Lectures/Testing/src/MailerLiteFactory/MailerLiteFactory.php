<?php

declare(strict_types=1);

namespace Kilo\MailerLiteFactory;


use Kilo\MailerLiteFactory\Exception\MailerLiteSdkException;

class MailerLiteFactory
{
    private EnvAsserter $envAsserter;

    private ?string $apiKey;

    public function __construct(EnvAsserter $envAsserter, ?string $apiKey)
    {
        $this->envAsserter = $envAsserter;
        $this->apiKey = $apiKey;
    }

    /**
     * @throws MailerLiteSdkException
     */
    public function build(): MailerLite
    {
        // jeigu env yra ne local, bet raktas yra null
        if ($this->envAsserter->isLocal() && !$this->getApiKey()) {
            return $this->buildFakeClient();
        }

        // tada turi subuildint klienta
        return $this->buildRealClient();
    }

    /**
     * @throws MailerLiteSdkException
     */
    private function buildRealClient(): MailerLite
    {
        return new MailerLite($this->getApiKey());
    }

    private function buildFakeClient(): FakeMailerLite
    {
        return new FakeMailerLite();
    }

    private function getApiKey(): ?string
    {
        return $this->apiKey;
    }
}
