<?php

namespace Area\Validator;

use Area\AreaEntity;

class HasExpectedNumberOfSquaresLinesTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->instance = new HasExpectedNumberOfSquaresLines(2, 3);
    }

    /**
     * @dataProvider invalidAreaProvider
     * @expectedException \Area\Exception\InvalidAreaException
     * @expectedExceptionCode \Area\Exception\InvalidAreaException::SQUARESLINES_NUMBER
     */
    public function testInvalidNumberOfSquaresLines($area)
    {
        $this->instance->validate($area);
    }

    public function invalidAreaProvider()
    {
        return [
            [new AreaEntity(['1234'])],
            [new AreaEntity(['12', '34', '56', '78'])]
        ];
    }

    public function testValidNumberSquaresLines()
    {
        $this->instance->validate(new AreaEntity(['123', '456', '789']));
    }
}
