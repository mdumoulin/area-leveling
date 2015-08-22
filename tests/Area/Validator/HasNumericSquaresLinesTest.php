<?php

namespace Area\Validator;

use Area\AreaEntity;

class HasNumericSquaresLinesTest extends \PHPUnit_Framework_TestCase
{
    private $instance;

    public function setUp()
    {
        $this->instance = new HasNumericSquaresLines();
    }

    /**
     * @expectedException     \Area\Exception\InvalidAreaException
     * @expectedExceptionCode \Area\Exception\InvalidAreaException::NOT_INTEGER_SQUARE
     */
    public function testNonNumericArea()
    {
        $this->instance->validate(new AreaEntity(['1432423DHJDS']));
    }

    public function testNumericArea()
    {
        $this->assertTrue(
            $this->instance->validate(new AreaEntity(['1234567890']))
        );
    }
}
