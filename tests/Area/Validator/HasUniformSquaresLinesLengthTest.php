<?php

namespace Area\Validator;

use Area\AreaEntity;

class HasUniformSquaresLinesLengthTest extends \PHPUnit_Framework_TestCase
{
    private $instance;

    public function setUp()
    {
        $this->instance = new HasUniformSquaresLinesLength();
    }

    /**
     * @expectedException     \Area\Exception\InvalidAreaException
     * @expectedExceptionCode \Area\Exception\InvalidAreaException::VARIOUS_LENGTH
     */
    public function testValidateWithVariousLength()
    {
        $this->instance->validate(new AreaEntity(['1432', '3129874']));
    }

    public function testValidateWithUniformLength()
    {
        $this->assertTrue(
            $this->instance->validate(new AreaEntity(['1245', '0987']))
        );
    }
}
