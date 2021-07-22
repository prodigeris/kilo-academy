<?php

declare(strict_types=1);

namespace Kilo\BmiCalculator;

class Bmi
{
    /**
     * @var BmiRange
     */
    private BmiRange $bmiRange;

    private float $bmi;

    public function __construct(BmiRange $bmiRange, float $bmi)
    {
        $this->bmiRange = $bmiRange;
        $this->bmi = $bmi;
    }

    public function getBmiRange(): BmiRange
    {
        return $this->bmiRange;
    }

    public function getBmi(): float
    {
        return $this->bmi;
    }
}
