<?php

use OfficeTwit\Services\User\UserCreatorService;
use OfficeTwit\Presenters\CollectionPresenter;

class UsersController extends BaseController {

    protected $creator;
    protected $collection; 

    public function __construct(UserCreatorService $creator, CollectionPresenter $collection)
    {
        $this->creator = $creator;

        $this->collection = $collection;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {         
        $users = new $this->collection('OfficeTwit\Presenters\UserPresenter', User::all());
        
        return View::make('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response Illuminate\View\View
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect
     */
    public function store()
    {
        if($this->creator->make(Input::all()))
            return Redirect::route('login')->with('flash_message', ['success' => 'You can now login.']);

        return Redirect::back()->withInput()->withErrors($this->creator->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response Illuminate\View\View
     */
    public function show($id)
    {
        return View::make('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response Illuminate\View\View
     */
    public function edit($id)
    {
        return View::make('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response Illuminate\View\View
     */
    public function update($id)
    {
    	//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	//
    }

    public function followUser($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();

        $me = Auth::user();

        $me->follows()->attach($user);

        return Redirect::back();
    }

    public function unfollowUser($username)
    {
        $user = User::where('username', '=', $username)->firstOrFail();

        $me = Auth::user();

        $me->follows()->detach($user);

        return Redirect::back();
        

    }
}
