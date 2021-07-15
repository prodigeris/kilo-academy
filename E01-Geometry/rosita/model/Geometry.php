<?php

namespace Kilo;


class Geometry
{
    public function calculateArea($shape): float
    {
        return round($shape->calculateArea(), 2);
    }

    public function calculatePerimeter($shape): float
    {
        return round($shape->calculatePerimeter(), 2);
    }
}

