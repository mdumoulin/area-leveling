<?php

namespace Area;

class AreaEntityTest extends \PHPUnit_Framework_TestCase
{
    public function testCount()
    {
        $this->assertCount(2, new AreaEntity(['01234', '56789']));
    }

    public function testTraversable()
    {
        $this->assertInstanceOf('Traversable', new AreaEntity(['01234']));
    }

    public function testGetFirstLineLength()
    {
        $area = new AreaEntity(['0123', '456789']);
        $this->assertSame(4, $area->getFirstSquaresLineLength());
    }
}
