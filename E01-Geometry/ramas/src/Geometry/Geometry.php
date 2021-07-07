<?php

declare(strict_types=1);

namespace Kilo\Geometry;

use Kilo\Geometry\Shape\ShapeInterface;

class Geometry
{
    private $shape;

    public function __construct(ShapeInterface $shape)
    {
        $this->shape = $shape;
    }

    public function area(): float
    {
        return $this->shape->calculateArea();
    }

    public function perimeter(): float
    {
        return $this->shape->calculatePerimeter();
    }
}
