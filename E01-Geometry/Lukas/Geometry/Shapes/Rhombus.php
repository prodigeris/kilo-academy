<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;
use InvalidArgumentException;

class Rhombus implements ShapeInterface
{
    /**
     * @var float
     */
    public float $side;

    /**
     * @var float
     */
    public float $altitude;

    /**
     * Rhombus constructor.
     * @param $side
     * @param $altitude
     */
    public function __construct(float $side, float $altitude)
    {
        if ($side <= $altitude) {
            throw new InvalidArgumentException(
                'Altitude - ' . $altitude . ', must be smaller than or equal to sides - ' . $side . ', to form a rhombus.'
            );
        }
        if ($side <= 0 || $altitude <= 0) {
            throw new InvalidArgumentException(
                'Invalid data input (no negative numbers!)'
            );
        }
        $this->side = $side;
        $this->altitude = $altitude;
    }

    /**
     * @return float|int
     */
    public function area(): float
    {
        return $this->altitude * $this->side;
    }

    /**
     * @return float|int
     */
    public function perimeter(): float
    {
        return $this->side * 4;
    }

}
