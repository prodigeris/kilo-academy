<?php


class Rectangle extends Shape
{
    public float $length;
    public float $width;


    public function __construct(float $length, float $width)
    {
        if($length>0) {
            $this->length = $length;
        } else{
            throw new InvalidArgumentException("Length cannot be less than 0");
        }

        if($width>0) {
            $this->width = $width;
        } else{
            throw new InvalidArgumentException("Width cannot be less than 0");
        }
    }

    public function calculateArea (float $edge1, float $edge2): float
    {
        return $edge1*$edge2;
    }

    public function calculatePerimeter (float $edge1, float $edge2): float
    {
        return 2*$edge1+2*$edge2;
    }

}