<?php namespace OfficeTwit\Services\User;

use OfficeTwit\Validation\UserValidator;
use OfficeTwit\Exceptions\ValidationException;
use OfficeTwit\Transformers\UserTransformer;
use User;

class UserCreatorService {
    protected $errors;

    protected $validator;

    protected $transformer;

    public function __construct(UserValidator $validator, UserTransformer $transformer)
    {
        $this->validator = $validator;

        $this->transformer = $transformer;
    }

    public function make(array $attributes)
    {

        try
        {
            $this->validator->isValid($attributes);
        }
        catch (ValidationException $e)
        {
            $this->errors = $e->getErrors();
            
            return false;
        }

        $attributes['settings'] = $this->getDefaultSettings();
        
        $this->create($attributes);

        return true;
    }

    public function update(array $attributes, User $user)
    {
        $attributes = $this->transformer->transformInput($attributes, $user);
        
        try
        {
            $this->validator->isValidForUpdate($attributes);
        }
        catch (ValidationException $e)
        {
            $this->errors = $e->getErrors();
            
            return false;
        }

        $this->updateUser($attributes, $user);

        return true;

    }

    protected function create($attributes)
    {
        User::create([
            'username' => $attributes['username'],
            'email' => $attributes['email'],
            'password' => $attributes['password'],
            'settings' => $attributes['settings']
        ]);        
    }

    protected function updateUser($attributes, $user)
    {
        
        $user->username = $attributes['username'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->settings = $this->getUpdatedSettings($attributes);
        
        $user->save();

    }

    protected function getDefaultSettings()
    {
        $settings = [
            'allowTwitter' => 0,
            'twitterHandle' => null,
            'publicEmail' => 0
        ];

        return json_encode($settings);
    }

    protected function getUpdatedSettings($attributes)
    {
        //set the checkbox value, probably need to run all settings through a class method or helper
        $attributes['allowTwitter'] = isset($attributes['allowTwitter']) ? 1 : 0;

        $settings = [
            'allowTwitter' => $attributes['allowTwitter'],
            'twitterHandle' => $attributes['twitterHandle']
        ];

        return json_encode($settings);
    }

    public function getErrors()
    {
        return $this->errors;
    }

}