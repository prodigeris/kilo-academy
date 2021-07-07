<?php


namespace Kilo;


class Circle implements Shape
{
    private float $radius;
    private CircleGeometry $geometry;

    /**
     * Circle constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
        $this->setGeometry();
    }

    /**
     * @return mixed
     */
    public function getRadius(): float
    {
        return $this->radius;
    }

    public function setGeometry(): void
    {
        $this->geometry = new CircleGeometry($this);
    }

    public function getGeometry(): CircleGeometry
    {
        return $this->geometry;
    }
}