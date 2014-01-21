<?php namespace OfficeTwit\Services\Twit;

use OfficeTwit\Validation\TwitValidator;
use OfficeTwit\Exceptions\ValidationException;
use User;
use Twit;

class TwitCreatorService {

    protected $errors;

    protected $validator;

    public function __construct(TwitValidator $validator)
    {
        $this->validator = $validator;
    }

    public function make(array $attributes, User $user)
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

        $this->create($attributes, $user);

        return true;
    }

    protected function create($attributes, $user)
    {
        Twit::create([
            'twit' => $attributes['twit'],
            'user_id' => $user->id
        ]);

        
    }

    public function getErrors()
    {
        return $this->errors;
    }

}