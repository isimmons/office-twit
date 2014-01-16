<?php

class TwitsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$twits = Twit::all();
		$tweets = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=isimmons33&count=2';
       		return View::make('twits.index', compact('twits', 'tweets'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        		return View::make('twits.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username)
	{
		if($username == Auth::user()->username)
		{
			$twits = Twit::where('user_id', '=', Auth::user()->id)->get();

        			return View::make('twits.show', compact('twits'));	
		}

		return Redirect::to('login');
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        		return View::make('twits.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
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

}
