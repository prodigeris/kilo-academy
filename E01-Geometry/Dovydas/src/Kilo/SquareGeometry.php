<?php


namespace Kilo;


class SquareGeometry extends Geometry
{
    private Square $square;

    public function __construct(Square $square)
    {
        $this->square = $square;
    }

    public function calcPerimeter(): float
    {
        return ($this->square->getHeight() * 2)+($this->square->getLength() * 2);
    }
    public function calcArea(): float
    {
        return ($this->square->getHeight() * $this->square->getLength());
    }
}