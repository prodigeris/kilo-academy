<?php

namespace Geometry;

class Geometry
{
    public function calculate(ShapeInterface $shape){
        echo 'The area of this shape is: '.$shape->area().' sq units, ';
        echo 'The perimeter of this shape is: '.$shape->perimeter().' units.' . PHP_EOL;
    }
}
