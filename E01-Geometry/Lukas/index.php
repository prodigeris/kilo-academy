<?php
require_once realpath("vendor/autoload.php");

use Geometry\Geometry;
use Geometry\Shapes\Circle;
use Geometry\Shapes\Rectangle;
use Geometry\Shapes\Rhombus;
use Geometry\Shapes\Square;

$shape = new Square(7);
$shape1 = new Circle(7);
$shape2 = new Rectangle(2,5);
$shape3 = new Rhombus(5,3);
$geometry = new Geometry();
$geometry->calculate($shape);
$geometry->calculate($shape1);
$geometry->calculate($shape2);
$geometry->calculate($shape3);

