<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;
use InvalidArgumentException;

class Square implements ShapeInterface
{
    /**
     * @var float
     */
    public float $side;

    /**
     * Square constructor.
     * @param $side
     */
    public function __construct(float $side)
    {
        if ($side <= 0) {
            throw new InvalidArgumentException(
                'Invalid data input (no negative numbers!)'
            );
        }
        $this->side = $side;
    }

    /**
     * @return float|int
     */
    public function area(): float
    {
        return $this->side * $this->side;
    }

    /**
     * @return float|int
     */
    public function perimeter(): float
    {
        return $this->side * 4;
    }

}
