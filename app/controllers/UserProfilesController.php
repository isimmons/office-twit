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
            $settings = null;
            if($user->settings !== null) $settings = json_decode($user->settings);
            return View::make('users.profile', compact('user', 'settings'));
        }

        return Redirect::to('login')->with('flash_message', 'you need to be logged in to see your profile foo!');
    }


    public function update()
    {
        $user = Auth::user();

        if(Input::get('allowTwitter'))
        {
            $twitter = Input::get('allowTwitter');
            $twitterHandle = Input::get('twitterHandle');
            $settings = ['allowTwitter' => $twitter, 'twitterHandle' => $twitterHandle];
            
            //assume validated for now
            $user->settings = json_encode($settings);
            $user->save();
        }

        return Redirect::route('user.profile.show');
    }
}