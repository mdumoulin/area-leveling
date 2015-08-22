<?php

namespace Area\Exception;

class InvalidAreaException extends \Exception
{
    const VARIOUS_LENGTH = 0x01;

    const NOT_INTEGER_SQUARE = 0x02;

    const SQUARESLINES_NUMBER = 0x03;

    const SQUARESLINES_LENGTH = 0x04;
}
