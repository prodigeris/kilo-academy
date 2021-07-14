<?php declare(strict_types=1);

namespace Kilo;

class Geometry
{

    public function perimeter(Shape $shape): float
    {
        return $shape->calcPerimeter();
    }

    public function area(Shape $shape): float
    {
        return $shape->calcArea();
    }

}