<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;

class Circle implements ShapeInterface
{
    public float $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function area(){
        return 3.14 * ($this->radius * $this->radius);
    }

    public function perimeter(){
        return 2 * 3.14 * $this->radius;
    }

}