<?php


namespace Kilo\Shape;


class Rhombus implements Shape
{
    private float $side;
    private float $height;
    private const SIDE_COUNT = 4;

    public function __construct($side, $height)
    {
        $this->side = $side;
        $this->height = $height;
    }

    public function calculateArea(): float
    {
        return $this->side * $this->height;
    }

    public function calculatePerimeter(): float
    {
        return self::SIDE_COUNT * $this->side;
    }
}
