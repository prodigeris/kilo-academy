<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;
use InvalidArgumentException;

class Circle implements ShapeInterface
{
    /**
     * @var float
     */
    public float $radius;

    /**
     * Circle constructor.
     * @param float $radius
     */
    public function __construct(float $radius)
    {
        if ($radius <= 0) {
            throw new InvalidArgumentException(
                'Invalid data input (no negative numbers!)'
            );
        }
        $this->radius = $radius;
    }

    /**
     * @return float
     */
    public function area(): float
    {
        return round(pi() * ($this->radius * $this->radius), 2);
    }

    /**
     * @return float
     */
    public function perimeter(): float
    {
        return round(2 * pi() * $this->radius, 2);
    }

}
