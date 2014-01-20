<?php

use OfficeTwit\Services\Twits\TwitCreatorService;

class TwitsController extends BaseController {

	protected $twitCreator;

	public function __construct(TwitCreatorService $twitCreator)
	{
		$this->twitCreator = $twitCreator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$twits = Twit::all();
		//$tweets = 'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=isimmons33&count=2';
       		return View::make('twits.index', compact('twits'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = Auth::user();

		if($this->twitCreator->make(Input::all(), $user))
			return Redirect::to('/twits/' . $user);

		return Redirect::back()->withInput()->withErrors($this->twitCreator->getErrors());

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
