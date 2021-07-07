<?php

declare(strict_types=1);

namespace Kilo\Geometry\Shape;

class Rectangle implements ShapeInterface
{
    private $length;
    private $width;

    public function __construct(float $length, float $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea(): float
    {
        return $this->length * $this->width;
    }

    public function calculatePerimeter(): float
    {
        return 2 * ($this->length + $this->width);
    }
}
