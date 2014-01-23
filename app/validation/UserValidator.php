<?php namespace OfficeTwit\Validation;

use OfficeTwit\Validation\Validator;

class UserValidator extends Validator {

    protected static $rules = [
        'username' => 'required',
        'email' => 'required',
        'password' => 'required'
    ];

    protected static $updateRules = [
        'username' => 'required',
        'email' => 'required'
    ];


}