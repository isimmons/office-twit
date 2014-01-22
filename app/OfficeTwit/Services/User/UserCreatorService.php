<?php namespace OfficeTwit\Services\User;

use OfficeTwit\Validation\UserValidator;
use OfficeTwit\Exceptions\ValidationException;
use User;

class UserCreatorService {
    protected $errors;

    protected $validator;

    public function __construct(UserValidator $validator)
    {
        $this->validator = $validator;
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
            'password' => $attributes['password']
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
        //return the json encoded default settings for a new user
    }

    protected function getUpdatedSettings($attributes)
    {
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