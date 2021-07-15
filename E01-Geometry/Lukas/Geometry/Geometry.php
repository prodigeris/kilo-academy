<?php

namespace Geometry;

class Geometry
{
    /**
     * @param ShapeInterface $shape
     */
    public function calculate(ShapeInterface $shape): void
    {
        echo 'The area of this ' . substr(get_class($shape), 16) . ' is: ' . $shape->area() . ' sq units, ';
        echo 'The perimeter of this ' . substr(get_class($shape), 16) . ' is: ' . $shape->perimeter() . ' units.' . PHP_EOL;
    }
}
