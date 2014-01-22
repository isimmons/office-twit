<?php namespace OfficeTwit\Validation;

use OfficeTwit\Exceptions\ValidationException;
use Validator as V;

abstract class Validator {

    protected $errors;

    public function isValid(array $attributes)
    {
        $v = V::make($attributes, static::$rules);

        if($v->fails())
        {
            $this->errors = $v->messages();
            
            throw new ValidationException('Validation failed.', $this->errors);
        }            

        return true;
    }

    public function isValidForUpdate(array $attributes)
    {

        $v = V::make($attributes, static::$updateRules);

        if($v->fails())
        {
            $this->errors = $v->messages();
            
            throw new ValidationException('Validation failed.', $this->errors);
        }            

        return true;
    }

    public function getErrors()
    {
        return $this->errors;
    }

}