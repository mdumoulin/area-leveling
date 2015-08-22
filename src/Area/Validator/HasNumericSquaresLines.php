<?php

namespace Area\Validator;

use Area\AreaEntity;
use Area\Exception\InvalidAreaException;

class HasNumericSquaresLines implements ValidatorInterface
{
    /**
     * @param AreaEntity $area
     * @return bool
     * @throws InvalidAreaException
     */
    public function validate(AreaEntity $area)
    {
        foreach ($area as $squaresLine) {
            if (!ctype_digit($squaresLine)) {
                throw new InvalidAreaException(
                    sprintf("Some square are not integer (%s).", $squaresLine),
                    InvalidAreaException::NOT_INTEGER_SQUARE
                );
            }
        }
        return true;
    }
}
