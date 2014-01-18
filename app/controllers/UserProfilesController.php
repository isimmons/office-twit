<?php

use OfficeTwit\Presenters\UserPresenter;

class UserProfilesController extends BaseController {

    /**
    * instance of OfficeTwit\Presenters\UserPresenter
    */
    protected $userPresenter;

    public function __construct(UserPresenter $userPresenter)
    {
        $this->userPresenter = $userPresenter;
    }

    /**
    * Shows the users profile
    *
    * @return View
    */
    public function show()
    {
            
            $user = new $this->userPresenter(Auth::user());
            
            return View::make('users.profile', compact('user'));    
        

        //this should never fire because of auth filter on route but just in case...
        //return Redirect::to('login')->with('flash_message', 'you need to be logged in to see your profile foo!');
        
    }


    // public function update()
    // {
    //     $user = Auth::user();

    //     if(Input::get('allowTwitter'))
    //     {
    //         $twitter = Input::get('allowTwitter');
    //         $twitterHandle = Input::get('twitterHandle');
    //         $settings = ['allowTwitter' => $twitter, 'twitterHandle' => $twitterHandle];
            
    //         //assume validated for now
    //         $user->settings = json_encode($settings);
    //         $user->save();
    //     }

    //     return Redirect::route('user.profile.show');
    // }
}