<?php namespace OfficeTwit\Services;

use Auth;
use Twitter;

class TwitterService
{


    public function getTimeline()
    {
        //$username = Auth::user()->username;

        //will need to get users twitter handle, simulate for now

        $screenName = 'isimmons33';

        $timeline = Twitter::getUserTimeline(array('screen_name' => $screenName, 'count' => 10, 'format' => 'object'));
        
        if( ! $timeline) return false;

        foreach ($timeline as $tweet) {
            if(isset($tweet->retweeted_status))
            {
                $tweet->text = $tweet->retweeted_status->text;
            }          
        }
        
        return $timeline;
    }
}