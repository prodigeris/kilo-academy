<?php

declare(strict_types=1);

namespace Kilo\Geometry\Shape;

interface ShapeInterface
{
    public function calculateArea(): float;

    public function calculatePerimeter(): float;
}
