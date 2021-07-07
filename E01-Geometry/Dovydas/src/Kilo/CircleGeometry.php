<?php


namespace Kilo;


class CircleGeometry extends Geometry
{
    private Circle $circle;

    public function __construct(Circle $circle)
    {
        $this->circle = $circle;
    }

    public function calcPerimeter(): float
    {
        return 2*pi()*$this->circle->getRadius();
    }
    public function calcArea(): float
    {
        return pi()*($this->circle->getRadius()**2);
    }
}