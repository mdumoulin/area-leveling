<?php

namespace Area;

class AreaLevelingTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider minEffortDataProvider
     */
    public function testMinEffort($minEffort, AreaEntity $area)
    {
        $areaLeveling = new AreaLeveling($area, []);
        $this->assertEquals($minEffort, $areaLeveling->getMinEffort());
    }

    public function minEffortDataProvider()
    {
        return [
            [8, new AreaEntity(["90"])],
            [8, new AreaEntity(["900000000"])],
            [2, new AreaEntity(["10", "31"])],
            [7, new AreaEntity(["54454", "61551"])],
            [0, new AreaEntity(["989"])],
        ];
    }
}
