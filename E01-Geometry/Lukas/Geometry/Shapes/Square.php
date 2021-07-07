<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;

class Square implements ShapeInterface
{
    public float $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function area(){
        return $this->side * $this->side;
    }

    public function perimeter(){
        return $this->side * 4;
    }

}