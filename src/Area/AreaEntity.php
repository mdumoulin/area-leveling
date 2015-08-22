<?php

namespace Area;

use Area\Exception\InvalidAreaException;

class AreaEntity implements \Countable, \IteratorAggregate
{

    /**
     * @var array
     */
    private $area = [];

    /**
     * @param array $area
     * @throws InvalidAreaException
     */
    public function __construct(array $area)
    {
        $this->area = $area;
    }

    /**
     * @return int
     */
    public function getFirstSquaresLineLength()
    {
        $firstSquaresLine = reset($this->area);
        return strlen($firstSquaresLine);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->area);
    }

    /**
     * @return array
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->area);
    }
}
