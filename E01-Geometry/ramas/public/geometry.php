<?php

use Kilo\Geometry\Geometry;
use Kilo\Geometry\Shape\Circle;
use Kilo\Geometry\Shape\Square;
use Kilo\Geometry\Shape\Rhombus;
use Kilo\Geometry\Shape\Rectangle;

require_once '../vendor/autoload.php';

/* ---- ---- SQUARE ---- ---- */
$square = new Square(2);
$geometry = new Geometry($square);

echo '<pre>';

echo '<strong>Square:</strong><br/>';

echo 'Area: ' . $geometry->area();

echo '<br/>';

echo 'Perimeter: ' . $geometry->perimeter();

/* ---- ---- RHOMBUS ---- ---- */
$rhombus = new Rhombus(10, 8);
$geometryRhombus = new Geometry($rhombus);
echo '<br/><br/>';

echo '<strong>Rhombus:</strong><br/>';

echo 'Area: ' . $geometryRhombus->area();

echo '<br/>';

echo 'Perimeter: ' . $geometryRhombus->perimeter();

/* ---- ---- RECTANGLE ---- ---- */
$rectangle = new Rectangle(10, 8);
$geometryRectangle = new Geometry($rectangle);
echo '<br/><br/>';

echo '<strong>Rectangle:</strong><br/>';

echo 'Area: ' . $geometryRectangle->area();

echo '<br/>';

echo 'Perimeter: ' . $geometryRectangle->perimeter();

/* ---- ---- CIRCLE ---- ---- */
$circle = new Circle(6);
$geometryCircle = new Geometry($circle);
echo '<br/><br/>';

echo '<strong>Circle:</strong><br/>';

echo 'Area: ' . $geometryCircle->area();

echo '<br/>';

echo 'Perimeter: ' . $geometryCircle->perimeter();
