<?php

namespace Area\Validator;

use Area\AreaEntity;

interface ValidatorInterface
{
    /**
     * @param AreaEntity $area
     * @return bool
     */
    public function validate(AreaEntity $area);
}
