<?php

declare(strict_types=1);

namespace Kilo\Solid\Workout;

use Kilo\Solid\Client\Client;

class Level
{
    public const BEGINNER = 'BEGINNER';

    public const INTERMEDIATE = 'INTERMEDIATE';

    public const ADVANCED = 'ADVANCED';

    public const PRO = 'PRO';

    public const WALKER = 'WALKER';


    /**
     * score - Client score
     *
     * @var int
     */
    private $score;

    public function __construct(int $score)
    {
        $this->score = $score;
    }

    private function isWalker(): bool
    {
        return Client::WALKER_RANGE[0] <= $this->score && $this->score <= Client::WALKER_RANGE[1];
    }

    private function isBeginner(): bool
    {
        return Client::BEGINNER_RANGE[0] <= $this->score && $this->score <= Client::BEGINNER_RANGE[1];
    }

    private function isIntermediate(): bool
    {
        return Client::INTERMEDIATE_RANGE[0] <= $this->score && $this->score <= Client::INTERMEDIATE_RANGE[1];
    }

    private function isAdvanced(): bool
    {
        return Client::ADVANCED_RANGE[0] <= $this->score && $this->score <= Client::ADVANCED_RANGE[1];
    }

    private function isPro(): bool
    {
        return Client::PRO_RANGE[0] <= $this->score && $this->score <= Client::PRO_RANGE[1];
    }

    public function getClientLevel(): ?string
    {
        if ($this->isWalker()) {
            return self::WALKER;
        }

        if ($this->isBeginner()) {
            return self::BEGINNER;
        }

        if ($this->isIntermediate()) {
            return self::INTERMEDIATE;
        }

        if ($this->isAdvanced()) {
            return self::ADVANCED;
        }

        if ($this->isPro()) {
            return self::PRO;
        }

        return null;
    }
}
