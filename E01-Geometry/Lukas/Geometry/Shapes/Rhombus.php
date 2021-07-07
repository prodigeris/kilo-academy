<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;

class Rhombus implements ShapeInterface
{
    public float $side;
    public float $altitude;

    public function __construct($side, $altitude)
    {
        $this->side = $side;
        $this->altitude = $altitude;
    }

    public function area(){
        if($this->side >= $this->altitude)
        return $this->altitude * $this->side;
        throw new \InvalidArgumentException('Altitude must be smaller than or equal to sides to form a rhombus.');
    }

    public function perimeter(){
        return $this->side * 4;
    }

}