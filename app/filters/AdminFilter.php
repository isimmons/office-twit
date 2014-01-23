<?php namespace OfficeTwit\Filters;

use OfficeTwit\Services\LoggerService;

class AdminFilter {

    protected $logger;

    public function __construct(LoggerService $logger)
    {
        $this->logger = $logger;
    }

    public function filter()
    {
        if(Auth::guest()) return Redirect::to('login')->with('flash_message', 'Please login.');

        if( ! Auth::user()->$this->isAdmin())
        {
            $this->logger->logit();//WIP log user IP, username, timestamp
            return Redirect::to('/')->with('flash_message', 'Attempting to access a restricted area.');
        }
    }

    protected function isAdmin()
    {
        if($user = Auth::user())
        {
            //check for admin role need to implement
            //simulate for now
            $role = 'admin';
            if($role !== 'admin') return false;

            return true;
        }

        return false;
    }
}