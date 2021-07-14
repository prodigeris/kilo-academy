<?php


abstract class Shape
{
    abstract public function calculateArea(float $edge1, float $edge2): float;
    abstract public function calculatePerimeter(float $edge1, float $edge2): float;
}