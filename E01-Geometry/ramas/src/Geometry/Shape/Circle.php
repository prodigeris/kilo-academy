<?php

declare(strict_types=1);

namespace Kilo\Geometry\Shape;

class Circle implements ShapeInterface
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return pi() * ($this->radius * $this->radius);
    }

    public function calculatePerimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}
