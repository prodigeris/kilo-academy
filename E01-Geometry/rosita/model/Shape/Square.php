<?php


namespace Kilo\Shape;

class Square implements Shape
{
    private float $side;
    private const SIDE_COUNT = 4;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function calculateArea(): float
    {
        return pow($this->side, 2);
    }

    public function calculatePerimeter(): float
    {
        return self::SIDE_COUNT * $this->side;
    }
}
