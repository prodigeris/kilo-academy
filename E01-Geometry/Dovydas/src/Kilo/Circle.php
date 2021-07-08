<?php


namespace Kilo;


class Circle implements Shape
{
    private float $radius;

    /**
     * Circle constructor.
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    /**
     * @return mixed
     */
    public function getRadius(): float
    {
        return $this->radius;
    }


    public function calcPerimeter(): float
    {
        return 2*pi()*$this->getRadius();
    }

    public function calcArea(): float
    {
        return pi()*($this->getRadius()**2);
    }
}