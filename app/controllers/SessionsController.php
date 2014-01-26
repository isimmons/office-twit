<?php

class SessionsController extends BaseController {
	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        		return View::make('sessions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only(['username', 'password']);
		
		
		if(Auth::attempt($input))
		{
			return Redirect::to('twits')->with('flash_message', ['success' => 'You are logged in.']);	
		}

		return Redirect::back()
			->with('flash_message', ['error' => 'Sorry the username/password combination is incorrect.'])
			->withInput();

		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}
