<?php namespace OfficeTwit\Transformers;

use User;

class UserTransformer {

    /**
    * Type cast input and check fields before use
    *
    * @param $input array
    * @return $input array
    */
    public function transformInput(array $input, User $user)
    {
        $input['password'] = $this->isPasswordUpdate($input) ? $input['password'] : $user->password;
        
        //set the checkbox value, probably need to run all settings through a class method or helper
        $input['allowTwitter'] = isset($input['allowTwitter']) ? 1 : 0;

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