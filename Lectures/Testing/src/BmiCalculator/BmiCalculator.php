<?php

declare(strict_types=1);

namespace Kilo\BmiCalculator;

class BmiCalculator
{
    private const EXTREMELY_OBESE_LIMIT = 35;

    private const OBESE_LIMIT = 30;

    private const OVERWEIGHT_LIMIT = 25;

    private const NORMAL_LIMIT = 18.5;

    private const UNDERWEIGHT_LIMIT = 0;

    public function calculate(float $heightInMeters, float $massInKilograms): Bmi
    {
        $bmi = $this->calculateBmi($massInKilograms, $heightInMeters);
        return new Bmi($this->getBmiRange($bmi), $bmi);
    }

    private function calculateBmi(float $massInKilograms, float $heightInMeters): float
    {
        return round(($massInKilograms / ($heightInMeters ** 2)), 1);
    }

    private function getBmiRange(float $bmi): BmiRange
    {
        foreach ($this->getBmiRangeLimits() as ['name' => $name, 'min_bmi' => $minBmi]) {
            if ($bmi >= $minBmi) {
                return $name;
            }
        }

        throw new \RuntimeException(sprintf('BMI range has not found [%f]', $bmi));
    }

    private function getBmiRangeLimits(): array
    {
        return [
            ['name' => BmiRange::EXTREMELY_OBESE(), 'min_bmi' => self::EXTREMELY_OBESE_LIMIT],
            ['name' => BmiRange::OBESE(), 'min_bmi' => self::OBESE_LIMIT],
            ['name' => BmiRange::OVERWEIGHT(), 'min_bmi' => self::OVERWEIGHT_LIMIT],
            ['name' => BmiRange::NORMAL(), 'min_bmi' => self::NORMAL_LIMIT],
            ['name' => BmiRange::UNDERWEIGHT(), 'min_bmi' => self::UNDERWEIGHT_LIMIT],
        ];
    }
}
