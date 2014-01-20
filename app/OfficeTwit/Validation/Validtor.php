<?php namespace OfficeTwit\Validation;

use Validator as V;

class Validator {

    public function isValid(array $attributes)
    {
        $v = V::validate($attributes, $this->rules);

        if($v->fails())
            throw new ValidationException('Failed to validate');

        return true;
    }

}