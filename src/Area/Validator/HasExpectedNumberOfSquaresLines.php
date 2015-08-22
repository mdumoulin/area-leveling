<?php

namespace Area\Validator;

use Area\AreaEntity;
use Area\Exception\InvalidAreaException;

class HasExpectedNumberOfSquaresLines implements ValidatorInterface
{
    /**
     * @var int
     */
    private $minNumber;

    /**
     * @var int
     */
    private $maxNumber;

    /**
     * @param int $minNumber
     * @param int $maxNumber
     */
    public function __construct($minNumber, $maxNumber)
    {
        $this->minNumber = (int) $minNumber;
        $this->maxNumber = (int) $maxNumber;
    }

    /**
     * @param AreaEntity $area
     * @return bool
     * @throws InvalidAreaException
     */
    public function validate(AreaEntity $area)
    {
        $nbSquaresLines = count($area);

        $isValidNbSquaresLines = $nbSquaresLines >= $this->minNumber
            && $nbSquaresLines <= $this->maxNumber;

        if (!$isValidNbSquaresLines) {
            throw new InvalidAreaException(
                sprintf(
                    "Number of squares lines (%s) is not valid. It should be between %s and %s.",
                    $nbSquaresLines,
                    $this->minNumber,
                    $this->maxNumber
                ),
                InvalidAreaException::SQUARESLINES_NUMBER
            );
        }
        return true;
    }
}
