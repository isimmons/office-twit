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
    $title = null;
    $url = Request::server('PATH_INFO');
    $parts = explode('/', $url);

    foreach ($parts as $part) {
        $title .= ucfirst($part) . '  ';
    }
    
    return $title;
}

