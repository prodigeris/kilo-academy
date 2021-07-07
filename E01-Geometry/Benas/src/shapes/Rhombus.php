<?php


class Rhombus extends Shape
{
    public float $edge;
    public float $degree=33;

    public function __construct(float $edge)
    {
        if($edge>0) {
            $this->edge = $edge;
        } else{
            throw new InvalidArgumentException("Edge cannot be less than 0");
        }
    }

    public function calculateArea (float $edge, float $degree): float
    {
        return round(pow($edge, 2) * sin(deg2rad($degree)),1);
    }

    public function calculatePerimeter (float $edge1, float $edge2): float
    {
        return 2*$edge1+2*$edge2;
    }


}