<?php


class Circle extends Shape
{
    public float $radius;
    public float $pi = 3.14;

    public function __construct(float $radius)
    {
        if($radius>0) {
            $this->radius = $radius;
        } else{
            throw new InvalidArgumentException("Radius cannot be less than 0");
        }
    }

    public function calculateArea(float $radius, float $pi): float
    {
        return $pi * pow($radius, 2);
    }

    public function calculatePerimeter (float $radius, float $pi): float
    {
        return 2*$pi*$radius;
    }
}