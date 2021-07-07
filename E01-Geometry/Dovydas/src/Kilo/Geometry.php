<?php declare(strict_types=1);

namespace Kilo;

class Geometry
{

    public function perimeter(Shape $shape): float
    {
        $geometryRules = $shape->getGeometry();
        return $geometryRules->calcPerimeter();
    }

    public function area(Shape $shape): float
    {
        $geometryRules = $shape->getGeometry();
        return $geometryRules->calcArea();
    }

}