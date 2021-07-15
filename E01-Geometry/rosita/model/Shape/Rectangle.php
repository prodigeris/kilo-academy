<?php


namespace Kilo\Shape;


class Rectangle implements Shape
{
    private float $width;
    private float $length;

    public function __construct($width, $length)
    {
        $this->width = $width;
        $this->length = $length;
    }
    public function calculateArea(): float
    {
        return $this->width * $this->length;
    }

    public function calculatePerimeter(): float
    {
        return 2 * ($this->width + $this->length);
    }
}
