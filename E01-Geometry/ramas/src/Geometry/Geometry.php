<?php

declare(strict_types=1);

namespace Kilo\Geometry;

use Kilo\Geometry\Shape\ShapeInterface;

class Geometry
{
    public function area(ShapeInterface $shape): float
    {
        return $shape->calculateArea();
    }

    public function perimeter(ShapeInterface $shape): float
    {
        return $shape->calculatePerimeter();
    }
}
