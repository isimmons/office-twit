<?php

use OfficeTwit\Services\Twit\TwitCreatorService;
use OfficeTwit\Presenters\UserPresenter;
use OfficeTwit\Presenters\CollectionPresenter;
use OfficeTwit\Services\TwitterService;

class TwitsController extends BaseController {

    protected $creator;
    protected $presenter;
    protected $twitter;

    public function __construct(
        TwitCreatorService $creator, UserPresenter $presenter, TwitterService $twitter)
    {
        $this->creator = $creator;

        $this->presenter = $presenter;

        $this->twitter = $twitter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response Illuminate\View\View
     */
    public function index()
    {  
        $twits = Twit::whereIn('user_id', function($query)
        {
            $query->select('follow_id')
                ->from('user_follows')
                ->where('user_id', Auth::user()->id);
        })->orWhere('user_id', Auth::user()->id)
        ->with('user')
        ->orderBy('created_at', 'DESC')
        ->get();

        //need users converted to UserPresenters for parse settings and get avitar
        foreach($twits as $twit)
        {
            $twit->user = new $this->presenter($twit->user);
        }

        $publicTweets = $this->twitter->getTimeline();
        
        return View::make('twits.index', compact('twits', 'publicTweets'));
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
