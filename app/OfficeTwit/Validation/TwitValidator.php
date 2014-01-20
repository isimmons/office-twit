<?php namespace OfficeTwit\Validation;

use OfficeTwit\Validation\Validator;

class TwitValidation extends Validator {

    protected $rules = [
        'body' => 'required'        
    ];


}