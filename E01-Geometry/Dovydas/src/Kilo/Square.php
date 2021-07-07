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
        $this->setGeometry();
    }


    public function setGeometry(): void
    {
        $this->geometry = new SquareGeometry($this);
    }

    /**
     * @return Geometry|SquareGeometry
     */
    public function getGeometry(): Geometry|SquareGeometry
    {
        return $this->geometry;
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



}