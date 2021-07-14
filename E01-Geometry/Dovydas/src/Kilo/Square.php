<?php

namespace Kilo;
class Square implements Shape
{
    private float $length;
    private float $height;
    private Geometry $geometry;

    /**
     * Square constructor.
     * @param float $length
     * @param float $height
     */
    public function __construct(float $length, float $height)
    {
        $this->length = $length;
        $this->height = $height;
    }
    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    public function calcPerimeter(): float
    {
        return ($this->getHeight() * 2)+($this->getLength() * 2);
    }
    public function calcArea(): float
    {
        return ($this->getHeight() * $this->getLength());
    }



}