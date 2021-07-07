<?php declare(strict_types=1);

namespace Kilo;

use PHPUnit\Framework\TestCase;

class GeometryTest extends TestCase
{
    public function testCanCalculateSquarePerimeterAndArea(): void
    {
        $geometry = new Geometry();
        $shape = new Square(10,10);
        $perimeter = $geometry->perimeter($shape);
        $area = $geometry->area($shape);
        $this->assertEquals(40,$perimeter);
        $this->assertEquals(100,$area);
    }
    public function testCanCalculateRectanglePerimeterAndArea(): void
    {
        $geometry = new Geometry();
        $shape = new Rectangle(10,20);
        $perimeter = $geometry->perimeter($shape);
        $area = $geometry->area($shape);
        $this->assertEquals(60,$perimeter);
        $this->assertEquals(200,$area);
    }
    public function testCanCalculateRhombusPerimeterAndArea(): void
    {
        $geometry = new Geometry();
        $shape = new Rhombus(10,15);
        $perimeter = $geometry->perimeter($shape);
        $area = $geometry->area($shape);
        $this->assertEquals(36,floor($perimeter));
        $this->assertEquals(75,$area);
    }
    public function testCanCalculateCirclePerimeterAndArea(): void
    {
        $geometry = new Geometry();
        $shape = new Circle(10);
        $perimeter = $geometry->perimeter($shape);
        $area = $geometry->area($shape);
        $this->assertEquals(62,floor($perimeter));
        $this->assertEquals(314,floor($area));
    }

}
