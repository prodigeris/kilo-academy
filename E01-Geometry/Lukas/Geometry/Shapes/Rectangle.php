<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;

class Rectangle implements ShapeInterface
{
    public float $width;
    public float $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function area(){
        return $this->width * $this->height;
    }

    public function perimeter(){
        return $this->width + $this->height + $this->width + $this->height;
    }

}