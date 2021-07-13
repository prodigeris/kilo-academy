<?php

declare(strict_types=1);

namespace Kilo\Solid\TrainingPlan;

class Version
{
    private $version;

    public function __construct(int $version)
    {
        $this->version = $version;
    }

    public function getVersion(): ?int
    {
        return $this->version === 1 ? null : $this->version;
    }
}
