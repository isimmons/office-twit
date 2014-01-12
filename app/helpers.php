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

