<?php

use Kilo\Geometry\Geometry;
use Kilo\Geometry\Shape\Circle;
use Kilo\Geometry\Shape\Square;
use Kilo\Geometry\Shape\Rhombus;
use Kilo\Geometry\Shape\Rectangle;

require_once '../vendor/autoload.php';

/* ---- ---- SQUARE ---- ---- */
$geometry = new Geometry();

echo '<pre>';

$square = new Square(2);
echo '<strong>Square:</strong><br/>';

echo 'Area: ' . $geometry->area($square);

echo '<br/>';

echo 'Perimeter: ' . $geometry->perimeter($square);

/* ---- ---- RHOMBUS ---- ---- */
$rhombus = new Rhombus(10, 8);
echo '<br/><br/>';

echo '<strong>Rhombus:</strong><br/>';

echo 'Area: ' . $geometry->area($rhombus);

echo '<br/>';

echo 'Perimeter: ' . $geometry->perimeter($rhombus);

/* ---- ---- RECTANGLE ---- ---- */
$rectangle = new Rectangle(10, 8);
echo '<br/><br/>';

echo '<strong>Rectangle:</strong><br/>';

echo 'Area: ' . $geometry->area($rectangle);

echo '<br/>';

echo 'Perimeter: ' . $geometry->perimeter($rectangle);

/* ---- ---- CIRCLE ---- ---- */
$circle = new Circle(6);
echo '<br/><br/>';

echo '<strong>Circle:</strong><br/>';

echo 'Area: ' . $geometry->area($circle);

echo '<br/>';

echo 'Perimeter: ' . $geometry->perimeter($circle);
