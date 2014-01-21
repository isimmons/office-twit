<?php

use OfficeTwit\Services\Twit\TwitCreatorService;

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
			return Redirect::to('/twits/' . $user->username);

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
