<?php


namespace Kilo\Shape;


class Circle implements Shape
{
    private float $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function calculatePerimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}
