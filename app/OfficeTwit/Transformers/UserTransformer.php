<?php namespace OfficeTwit\Transformers;

use User;

class UserTransformer {

    /**
    * Type cast input before use
    *
    * @param $input array
    * @return $input array
    */
    public function transformInput(array $input, User $user)
    {
        $input['password'] = $this->isPasswordUpdate($input) ? $input['password'] : $user->password;
        
        $input['allowTwitter'] = (int) $input['allowTwitter'];

        return $input;
    }

    /**
    * Type cast the model data before use
    *
    * @param $user User
    * @return $user User
    */
    public function transformOutput(User $user)
    {
        $user->allowTwitter = (int) $user->allowTwitter;

        return $user;
    }

    /**
    * Determine if user is updating password
    *
    * @param $input array
    * @return boolean
    */
    protected function isPasswordUpdate(array $input)
    {
        if(! empty($input['oldPassword']) && ! empty($input['password']))
            return true;

        return false;
    }

}