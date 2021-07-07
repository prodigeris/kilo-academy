<?php


namespace Kilo;


class Rhombus implements Shape
{
    private float $side;
    private float $diagonal1;
    private float $diagonal2;
    private RhombusGeometry $geometry;

    /**
     * Rhombus constructor.
     * @param float $diagonal1
     * @param float $diagonal2
     */
    public function __construct(float $diagonal1, float $diagonal2)
    {
        $this->diagonal1 = $diagonal1;
        $this->diagonal2 = $diagonal2;
        $this->side = sqrt($diagonal1**2 + $diagonal2**2)/2;
        $this->setGeometry();
    }

    /**
     * @return float|int
     */
    public function getSide(): float|int
    {
        return $this->side;
    }

    /**
     * @return float
     */
    public function getDiagonal1(): float
    {
        return $this->diagonal1;
    }

    /**
     * @return float
     */
    public function getDiagonal2(): float
    {
        return $this->diagonal2;
    }

    public function setGeometry(): void
    {
        $this->geometry = new RhombusGeometry($this);
    }

    public function getGeometry(): RhombusGeometry
    {
        return $this->geometry;
    }
}