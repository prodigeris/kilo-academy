<?php
require "src/Shape.php";
require "src/shapes/Circle.php";
require "src/shapes/Rectangle.php";
require "src/shapes/Rhombus.php";

// Circle
$circle = new Circle(2);
echo $circle->calculateArea($circle->radius, $circle->pi)." ";
echo $circle->calculatePerimeter($circle->radius, $circle->pi)." ";


// Rectangle (Square)
$square = new Rectangle(2, 2);
echo $square->calculateArea($square->length, $square->width)." ";
echo $square->calculatePerimeter($square->length, $square->width)." ";

// Rectangle
$rectangle = new Rectangle(1,3);
echo $rectangle->calculateArea($rectangle->length, $rectangle->width)." ";
echo $rectangle->calculatePerimeter($rectangle->length, $rectangle->width)." ";

// Rhombus
$rhombus = new Rhombus(2);
echo $rhombus->calculateArea($rhombus->edge, $rhombus->degree)." ";
echo $rhombus->calculatePerimeter($rhombus->edge, $rhombus->edge)." ";
