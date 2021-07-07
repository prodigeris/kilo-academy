<?php


namespace Kilo;


class RectangleGeometry extends Geometry
{
    private Rectangle $rectangle;

    public function __construct(Rectangle $rectangle)
    {
        $this->rectangle = $rectangle;
    }

    public function calcPerimeter(): float
    {
        return ($this->rectangle->getHeight() * 2)+($this->rectangle->getLength() * 2);
    }
    public function calcArea(): float
    {
        return ($this->rectangle->getHeight() * $this->rectangle->getLength());
    }
}