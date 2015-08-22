<?php

namespace Area;

use Area\Validator\HasExpectedNumberOfSquaresLines;
use Area\Validator\HasExpectedSquaresLinesLength;
use Area\Validator\HasNumericSquaresLines;
use Area\Validator\HasUniformSquaresLinesLength;

class AreaService
{
    /**
     * @param array $area
     * @return int
     */
    public function getMinEffort(array $area)
    {
        $validators = [
            new HasExpectedSquaresLinesLength(0, 50),
            new HasExpectedNumberOfSquaresLines(0, 50),
            new HasNumericSquaresLines(),
            new HasUniformSquaresLinesLength()
        ];

        $areaEntity = new AreaEntity($area);
        $leveling = new AreaLeveling($areaEntity, $validators);

        return $leveling->getMinEffort();
    }
}
