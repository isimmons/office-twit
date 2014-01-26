<?php

/**
* Returns the correct nav links based on authentication
* 
* @return array
*/
function getNavLinks()
{
    if(Auth::check()) 
    {
        $username = Auth::user()->username;
        
        $navLinks = [
            'Twits' => '/twits',
            'Me' => "/twits/{$username}",
            'Profile' => '/profile',
            'Users' => '/users'
        ];
           
        $links = null;

        foreach ($navLinks as $text => $link) {
            $links .= "<li><a href={$link}>{$text}</a></li>";
        }
        return $links;
    }

    return null;
}

function getGravitar($email, $size = 60)
{
    return 'https://s.gravatar.com/avatar/' . md5($email) . '?s=' . $size;
}

function getPageTitle()
{
    //set the default from the application config file
    $title = Config::get('officeTwit.appName') . ' | ';
    $url = Request::server('PATH_INFO');
    $parts = explode('/', $url);

    foreach ($parts as $part) {
        $title .= ucfirst($part) . '  ';
    }
    
    return $title;
}

function getFlash(array $message)
{
    //get the first key
    reset($message);
    $key = key($message);
    
    return "<div class='flash_{$key}'>{$message[$key]}</div>";
}

function getFollowLink($user)
{
    //no follow link if username is self
    if(Auth::user()->username == $user->username)
        return null;

    //see if logged in user is already following
    $following = false; 
    foreach ($user->followers as $follower) {
        if (Auth::user()->username == $follower->username) {
            $following = true;
        }
    }

    $text = $following === true ? 'unfollow' : 'follow';
    $btnType = $following === true ? ' btn-primary ' : ' btn-success ';

    $link = link_to(
        "users/{$user->username}/{$text}",
        ucfirst($text) . ' ' . ucfirst($user->username),
        ['class' => 'btn' .  $btnType  . 'btn-follow']);

    return $link;
}

