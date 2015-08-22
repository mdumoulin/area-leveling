<?php

namespace Area;

class AreaServiceTest extends \PHPUnit_Framework_TestCase
{
    private $instance;

    public function setUp()
    {
        $this->instance = new AreaService();
    }

    public function testGetMinEffort()
    {
        $this->assertSame(8, $this->instance->getMinEffort(["90"]));
        $this->assertSame(8, $this->instance->getMinEffort(["900000000"]));
        $this->assertSame(2, $this->instance->getMinEffort(["10", "31"]));
        $this->assertSame(7, $this->instance->getMinEffort(["54454", "61551"]));
        $this->assertSame(0, $this->instance->getMinEffort(["989"]));
    }
}
