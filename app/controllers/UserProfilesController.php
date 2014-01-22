<?php

use OfficeTwit\Presenters\UserPresenter;
use OfficeTwit\Services\User\UserCreatorService;

class UserProfilesController extends BaseController {

    /**
    * instance of OfficeTwit\Presenters\UserPresenter
    */
    protected $presenter;

    /**
    * instance of OfficeTwit\Validation\UserCreatorService
    */
    protected $creator;

    public function __construct(UserPresenter $presenter, UserCreatorService $creator)
    {
        $this->presenter = $presenter;

        $this->creator = $creator;
    }

    /**
    * Shows the users profile
    *
    * @return View
    */
    public function show()
    {
            $user = new $this->presenter(Auth::user());
            
            return View::make('users.profile', compact('user'));    
    }

    public function update()
    {
        $user = Auth::user();
        
        if($this->creator->update(Input::all(), $user))
            return Redirect::route('user.profile.show');

        return Redirect::back()->withInput()->withErrors($this->creator->getErrors());
    }
}