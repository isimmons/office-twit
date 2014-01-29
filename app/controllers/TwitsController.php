<?php

use OfficeTwit\Services\Twit\TwitCreatorService;
use OfficeTwit\Presenters\UserPresenter;
use OfficeTwit\Presenters\CollectionPresenter;

class TwitsController extends BaseController {

    protected $creator;
    protected $presenter;

    public function __construct(TwitCreatorService $creator, UserPresenter $presenter)
    {
        $this->creator = $creator;

        $this->presenter = $presenter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response Illuminate\View\View
     */
    public function index()
    {
        $twits = Twit::select(['twits.*', 'users.*'])
            ->join('users', 'twits.user_id', '=', 'users.id')
            ->leftJoin('user_follows', 'users.id', '=', 'user_follows.follow_id')
            ->where('user_follows.user_id', '=', Auth::user()->id)
            ->orWhere('users.id', '=', Auth::user()->id)
            ->orderBy('twits.created_at', 'DESC')
            ->with('user')
            ->get();

        foreach($twits as $twit)
        {
            $twit->user = new $this->presenter($twit->user);
        }

        return View::make('twits.index', compact('twits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Redirect Illuminate\Routing\Redirector
     */
    public function store()
    {    	
        $user = Auth::user();

        if ($this->creator->make(Input::all(), $user))
            return Redirect::to('/twits/' . $user->username);

        return Redirect::back()->withInput()->withErrors($this->creator->getErrors());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Mixed
     */
    public function show($username)
    {
            $user = User::with('twits')->where('username', '=', $username)->firstOrFail();
                       
            $user = new $this->presenter($user);
            
            return View::make('twits.show', compact('user'));
         	
    }
}
