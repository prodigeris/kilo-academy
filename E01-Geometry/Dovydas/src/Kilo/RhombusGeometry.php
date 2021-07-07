<?php


namespace Kilo;


class RhombusGeometry extends Geometry
{
    private Rhombus $rhombus;

    public function __construct(Rhombus $rhombus)
    {
        $this->rhombus = $rhombus;
    }

    public function calcPerimeter(): float
    {
        return $this->rhombus->getSide()*4;
    }
    public function calcArea(): float
    {
        return $this->rhombus->getDiagonal1() * $this->rhombus->getDiagonal2() / 2;
    }
}