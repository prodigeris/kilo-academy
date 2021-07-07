<?php

declare(strict_types=1);

namespace Kilo\Geometry\Shape;

use InvalidArgumentException;

class Rhombus implements ShapeInterface
{
    private $length;
    private $height;

    public function __construct(float $length, float $height)
    {
        if ($height > $length) {
            throw new InvalidArgumentException('Height must be less or equal to length.');
        }

        $this->length = $length;
        $this->height = $height;
    }

    public function calculateArea(): float
    {
        return $this->length * $this->height;
    }

    public function calculatePerimeter(): float
    {
        return $this->length * 4;
    }
}
