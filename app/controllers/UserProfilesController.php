<?php

class UserProfilesController extends BaseController {

    /**
    * Shows the users profile if logged in
    *
    * @return View
    */
    public function show()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            return View::make('users.profile', compact('user'));
        }

        return Redirect::to('login')->with('flash_message', 'you need to be logged in to see your profile foo!');
    }
}