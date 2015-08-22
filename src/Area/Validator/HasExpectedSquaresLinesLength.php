<?php

namespace Area\Validator;

use Area\AreaEntity;
use Area\Exception\InvalidAreaException;

class HasExpectedSquaresLinesLength implements ValidatorInterface
{
    /**
     * @var int
     */
    private $minSquaresLineLength;

    /**
     * @var int
     */
    private $maxSquaresLineLength;

    /**
     * @param int $minSquaresLineLength
     * @param int $maxSquaresLineLength
     */
    public function __construct($minSquaresLineLength, $maxSquaresLineLength)
    {
        $this->minSquaresLineLength = (int) $minSquaresLineLength;
        $this->maxSquaresLineLength = (int) $maxSquaresLineLength;
    }

    /**
     * @param AreaEntity $area
     * @return bool
     * @throws \Exception
     */
    public function validate(AreaEntity $area)
    {
        foreach ($area as $squaresLine) {
            $squaresLineLength = strlen($squaresLine);

            $isValidSquaresLineLength = $squaresLineLength >= $this->minSquaresLineLength
                && $squaresLineLength <= $this->maxSquaresLineLength;

            if (!$isValidSquaresLineLength) {
                throw new InvalidAreaException(
                    sprintf(
                        "Invalid number of squares (%s) in one or more line. It should be between %s and %s.",
                        $squaresLineLength,
                        $this->minSquaresLineLength,
                        $this->maxSquaresLineLength
                    ),
                    InvalidAreaException::SQUARESLINES_LENGTH
                );
            }
        }
        return true;
    }
}
