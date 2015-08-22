<?php

namespace Area\Validator;

use Area\AreaEntity;
use Area\Exception\InvalidAreaException;

class HasUniformSquaresLinesLength implements ValidatorInterface
{

    /**
     * @param AreaEntity $area
     * @return bool
     * @throws InvalidAreaException
     */
    public function validate(AreaEntity $area)
    {
        $expectedLength = $area->getFirstSquaresLineLength();

        foreach ($area as $squaresLine) {
            $squaresLineLength = strlen($squaresLine);

            if ($expectedLength !== $squaresLineLength) {
                throw new InvalidAreaException(
                    "Some squares line have not the same length",
                    InvalidAreaException::VARIOUS_LENGTH
                );
            }
        }
        return true;
    }
}
