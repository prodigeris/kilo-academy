<?php

declare(strict_types=1);

namespace Kilo\Geometry\Shape;

class Square implements ShapeInterface
{
    private $length;

    public function __construct(float $length)
    {
        $this->length = $length;
    }

    public function calculateArea(): float
    {
        return $this->length * $this->length;
    }

    public function calculatePerimeter(): float
    {
        return $this->length * 4;
    }
}
