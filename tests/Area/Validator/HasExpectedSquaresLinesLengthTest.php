<?php

namespace Area\Validator;

use Area\AreaEntity;

class HasExpectedSquaresLinesLengthTest extends \PHPUnit_Framework_TestCase
{
    private $instance;

    public function setUp()
    {
        $this->instance = new HasExpectedSquaresLinesLength(2, 3);
    }

    /**
     * @dataProvider invalidAreaProvider
     * @expectedException \Area\Exception\InvalidAreaException
     * @expectedExceptionCode \Area\Exception\InvalidAreaException::SQUARESLINES_LENGTH
     */
    public function testInvalidQuaresLinesLength(AreaEntity $invalidArea)
    {
        $this->instance->validate($invalidArea);
    }

    public function invalidAreaProvider()
    {
        return [
            [new AreaEntity(['1'])],
            [new AreaEntity(['1234567890'])]
        ];
    }

    public function testValidSquaresLinesLength()
    {
        $this->assertTrue(
            $this->instance->validate(new AreaEntity(['123']))
        );
    }
}
