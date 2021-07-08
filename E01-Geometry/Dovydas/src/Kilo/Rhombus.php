<?php


namespace Kilo;


class Rhombus implements Shape
{
    private float $side;
    private float $diagonal1;
    private float $diagonal2;

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


    public function calcPerimeter(): float
    {
        return $this->getSide()*4;
    }

    public function calcArea(): float
    {
        return $this->getDiagonal1() * $this->getDiagonal2() / 2;
    }
}