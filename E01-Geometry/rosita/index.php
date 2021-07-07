<?php

require __DIR__ . '/vendor/autoload.php';

use Kilo\Geometry;
use Kilo\Shape\Circle;
use Kilo\Shape\Rectangle;
use Kilo\Shape\Rhombus;
use Kilo\Shape\Square;

echo '<b>Circle calculations:</b><br>';
$shape = new Circle(3);
$geometry = new Geometry();
echo 'Area: ' . $geometry->calculateArea($shape) . '<br>';
echo 'Perimeter: ' . $geometry->calculatePerimeter($shape) . '<br>';

echo '<b>Square calculations:</b><br>';
$shape = new Square(3);
$geometry = new Geometry();
echo 'Area: ' . $geometry->calculateArea($shape) . '<br>';
echo 'Perimeter: ' . $geometry->calculatePerimeter($shape) . '<br>';

echo '<b>Rectangle calculations:</b><br>';
$shape = new Rectangle(4, 6);
$geometry = new Geometry();
echo 'Area: ' . $geometry->calculateArea($shape) . '<br>';
echo 'Perimeter: ' . $geometry->calculatePerimeter($shape) . '<br>';

echo '<b>Rhombus calculations:</b><br>';
$shape = new Rhombus(6, 3);
$geometry = new Geometry();
echo 'Area: ' . $geometry->calculateArea($shape) . '<br>';
echo 'Perimeter: ' . $geometry->calculatePerimeter($shape) . '<br>';
