<?php


namespace Kilo;


class Rectangle implements Shape
{
    private float $length;
    private float $height;
    private RectangleGeometry $geometry;

    /**
     * Rectangle constructor.
     * @param float $length
     * @param float $height
     */
    public function __construct(float $length, float $height)
    {
        $this->length = $length;
        $this->height = $height;
        $this->setGeometry();
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


    public function setGeometry(): void
    {
        $this->geometry = new RectangleGeometry($this);
    }

    public function getGeometry(): RectangleGeometry
    {
        return $this->geometry;
    }
}