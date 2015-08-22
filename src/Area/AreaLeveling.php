<?php

namespace Area;

use Area\Validator\ValidatorInterface;

class AreaLeveling
{

    const LOWEST_LEVEL = 0;

    const HIGHEST_LEVEL = 9;

    /**
     * @var AreaEntity
     */
    private $area;

    /**
     * @var ValidatorInterface[]
     */
    private $validators;

    /**
     * @var array
     */
    private $areaStats = [
        '0' => 0,
        '1' => 0,
        '2' => 0,
        '3' => 0,
        '4' => 0,
        '5' => 0,
        '6' => 0,
        '7' => 0,
        '8' => 0,
        '9' => 0
    ];

    /**
     * @param AreaEntity $area
     * @param ValidatorInterface[] $validators
     */
    public function __construct(AreaEntity $area, array $validators)
    {
        $this->area = $area;
        $this->validators = $validators;
    }

    /**
     * @return int
     */
    public function getMinEffort()
    {
        $this
            ->validateArea()
            ->calculateAreaStats();

        $minEffort = null;

        for ($minLevel = self::LOWEST_LEVEL; $minLevel < self::HIGHEST_LEVEL; $minLevel++) {
            $effort = $this->getEffort($minLevel, $minLevel + 1);

            if (null === $minEffort || $effort < $minEffort) {
                $minEffort = $effort;
            }
        }
        return $minEffort;
    }

    /**
     * @return $this
     */
    private function validateArea()
    {
        foreach ($this->validators as $validator) {
            $validator->validate($this->area);
        }
        return $this;
    }

    /**
     * Compute each number occurrences to ease effort calculation
     *
     * @return $this
     */
    private function calculateAreaStats()
    {
        foreach ($this->area as $squaresLine) {
            $squaresLineLength = strlen($squaresLine);

            for ($i = 0; $i < $squaresLineLength; $i++) {
                $squareLevel = $squaresLine[$i];
                $this->areaStats[$squareLevel]++;
            }
        }
        return $this;
    }

    /**
     * @param int $minLevel
     * @param int $maxLevel
     * @return int
     */
    private function getEffort($minLevel, $maxLevel)
    {
        $effort = 0;

        foreach ($this->areaStats as $squareLevel => $total) {
            if ($squareLevel < $minLevel) {
                $effort += ($minLevel - $squareLevel) * $total;
            } elseif ($squareLevel > $maxLevel) {
                $effort += ($squareLevel - $maxLevel) * $total;
            }
        }
        return $effort;
    }
}
