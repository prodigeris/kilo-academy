<?php

namespace Geometry\Shapes;

use Geometry\ShapeInterface;
use InvalidArgumentException;

class Rectangle implements ShapeInterface
{
    /**
     * @var float
     */
    public float $width;

    /**
     * @var float
     */
    public float $height;

    /**
     * Rectangle constructor.
     * @param $width
     * @param $height
     */
    public function __construct(float $width, float $height)
    {
        if ($width <= 0 || $height <= 0) {
            throw new InvalidArgumentException(
                'Invalid data input (no negative numbers!)'
            );
        }
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return float|int
     */
    public function area(): float
    {
        return $this->width * $this->height;
    }

    /**
     * @return float
     */
    public function perimeter(): float
    {
        return $this->width + $this->height + $this->width + $this->height;
    }

}
