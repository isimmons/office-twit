<?php namespace OfficeTwit\Validation;

use OfficeTwit\Validation\Validator;

class TwitValidator extends Validator {

    protected static $rules = [
        'twit' => 'required'        
    ];


}